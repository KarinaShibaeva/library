<?php

namespace app\controllers;

use app\models\Application;
use app\models\Book;
use app\models\Booking;
use app\models\Category;
use app\models\Comment;
use app\models\News;
use app\models\RegisterForm;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'layout-fluid';
        $this->getView()->registerCssFile('@web/css/main.css');
        $posts = News::find()->orderBy('date desc')->limit(2)->all();
        $books = Book::find()->orderBy('date_add desc')->limit(5)->all();
        return $this->render('index', ['posts'=>$posts, 'books'=>$books]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(Yii::$app->user->identity->isAdmin()){
                return $this->redirect(['/admin']);
            }
            return $this->redirect(['/site/kabinet']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            return $this->goHome();
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionApplication()
    {
        $model = new Application();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('success', 'Ваша заявка отправлена');
            $model->save();
            return $this->refresh();
        }
        return $this->render('application', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $books = Book::find()->orderBy('date_add desc')->limit(5)->all();
        $categories = Category::find()->all();
        return $this->render('about', ['books'=>$books, 'categories'=>$categories]);
    }

    public function actionDetails()
    {
        if(isset($_GET['id']) && $_GET['id']!=""){
            $categories = Category::find()->where(['id'=>$_GET['id']])->asArray()->one();
            $books = Book::find()->where(['id'=>$_GET['id']])->all();

            //$teachers = Teacher::find()->all();


            return $this->render('details', [
                'categories'=>$categories,
                'books'=>$books,
            ]);

        }
        else
            return $this->redirect(['site/about']);
    }

    public function actionBook()
    {
        if (isset($_GET['id']) && $_GET['id']!="")
        {
            $categories = Category::find()->where(['id'=>$_GET['id']])->asArray()->one();

            $books = Book::find()->where(['genre_id'=>$_GET['id']])->all();

            //$sect = Section::find()->where(['id'=>$_GET['id']])->asArray()->all();
            //return $this->render('section', compact('categories', 'sections'));

            return $this->render('book', [
                'books' => $books,
                'categories' => $categories,
            ]);
        }
        else
            return $this->redirect(['site/about']);
    }

    public function actionNews()
    {
        if (isset($_GET['id']) && $_GET['id']!="")
        {
            $new = News::find()->where(['id'=>$_GET['id']])->all();

            $model = new Comment();
            $comments = Comment::find()->orderBy('id desc')->all();
            $goodstatus = Comment::find()->where(['status'=>1])->all();
            if ($model->load(Yii::$app->request->post()) && $model->saveComment()) {
                Yii::$app->session->setFlash('success', 'Ваш отзыв успешно отправлен!');

                return $this->refresh();
            }
            $count = count($comments);
            return $this->render('news', [
                'new' => $new,
                'comments' => $comments,
                'model' => $model,
                'count' => $count,
                'goodstatus' => $goodstatus
            ]);
        }
        else
            return $this->redirect(['site/about']);
    }

    public function actionNewslist()
    {
        $query = News::find();
        $count = clone $query;
        $pages = new Pagination(['totalCount'=>$count->count(), 'pageSize'=>3]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('newslist', ['posts' => $posts, 'pages' => $pages]);
    }

    public function actionKabinet()
    {
        $applications = Application::find()->where(['user_id' => Yii::$app->user->id])->all();
        $bookings = Booking::find()->where(['user_id' => Yii::$app->user->id])->all();

        if(count($applications) === 0) {
            // Сохраняем сообщение во флэш-памяти
            Yii::$app->session->setFlash('noRequests', 'Добро пожаловать в личный кабинет! Ваши заявки будут отображаться здесь, как только вы их отправите.');
        }

        return $this->render('kabinet', [
            'applications' => $applications,
            'bookings' => $bookings,
        ]);

    }

    public function actionBooking()
    {
        $model = new Booking();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('success', 'Ваша запись успешно отправлена!');
            $model->saveBooking();
            return $this->refresh();
        }
        return $this->render('booking', [
            'model'=>$model,
        ]);
    }

}
