<?php

use common\models\User;
use yii\db\Migration;

class m240529_111122_seed_data extends Migration
{
    /**
     * @return bool|void
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'webmaster',
            'email' => 'webmaster@example.com',
            'phone' => '998aaxxxyyzz',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('webmaster'),
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'access_token' => Yii::$app->getSecurity()->generateRandomString(40),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 2,
            'username' => 'manager',
            'email' => 'manager@example.com',
            'phone' => '998bbxxxyyzz',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('manager'),
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'access_token' => Yii::$app->getSecurity()->generateRandomString(40),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 3,
            'username' => 'user',
            'email' => 'user@example.com',
            'phone' => '998ccxxxyyzz',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('user'),
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'access_token' => Yii::$app->getSecurity()->generateRandomString(40),
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);

        $this->insert('{{%user_profile}}', [
            'user_id' => 1,
            'locale' => Yii::$app->sourceLanguage,
            'firstname' => 'Ilhomjon',
            'lastname' => 'Kurbanov'
        ]);
        $this->insert('{{%user_profile}}', [
            'user_id' => 2,
            'locale' => Yii::$app->sourceLanguage,
            'firstname' => 'Ilhomjon',
            'lastname' => 'Qurbonov'
        ]);
        $this->insert('{{%user_profile}}', [
            'user_id' => 3,
            'locale' => Yii::$app->sourceLanguage,
            'firstname' => 'Ilkhomjon',
            'lastname' => 'Kurbanov'
        ]);

        $this->insert('{{%page}}', [
            'slug' => 'about',
            'title' => 'About',
            'title_en' => 'About (En)',
            'title_ru' => 'About (Ru)',
            'title_uz' => 'About (Uz)',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'body_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. (En)',
            'body_ru' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. (Ru)',
            'body_uz' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. (Uz)',
            'status' => \common\models\Page::STATUS_PUBLISHED,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%article_category}}', [
            'id' => 1,
            'slug' => 'news',
            'title' => 'News',
            'title_en' => 'News (En)',
            'title_ru' => 'News (Ru)',
            'title_uz' => 'News (Uz)',
            'status' => \common\models\ArticleCategory::STATUS_ACTIVE,
            'created_at' => time()
        ]);

        $this->insert('{{%widget_menu}}', [
            'key' => 'frontend-index',
            'title' => 'Frontend index menu',
            'title_en' => 'Frontend index menu (En)',
            'title_ru' => 'Frontend index menu (Ru)',
            'title_uz' => 'Frontend index menu (Uz)',
            'items' => json_encode([
                [
                    'label' => 'Get started with Yii2',
                    'url' => 'http://www.yiiframework.com',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-success">{label}</a>'
                ],
                [
                    'label' => 'Yii2 Starter Kit on GitHub',
                    'url' => 'https://github.com/yii2-starter-kit/yii2-starter-kit',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-primary">{label}</a>'
                ],
                [
                    'label' => 'Find a bug?',
                    'url' => 'https://github.com/yii2-starter-kit/yii2-starter-kit/issues',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-danger">{label}</a>'
                ]

            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'items_en' => json_encode([
                [
                    'label' => 'Get started with Yii2 (En)',
                    'url' => 'http://www.yiiframework.com',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-success">{label}</a>'
                ],
                [
                    'label' => 'Yii2 Starter Kit on GitHub (En)',
                    'url' => 'https://github.com/yii2-starter-kit/yii2-starter-kit',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-primary">{label}</a>'
                ],
                [
                    'label' => 'Find a bug? (En)',
                    'url' => 'https://github.com/yii2-starter-kit/yii2-starter-kit/issues',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-danger">{label}</a>'
                ]
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'items_ru' => json_encode([
                [
                    'label' => 'Get started with Yii2 (Ru)',
                    'url' => 'http://www.yiiframework.com',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-success">{label}</a>'
                ],
                [
                    'label' => 'Yii2 Starter Kit on GitHub (Ru)',
                    'url' => 'https://github.com/yii2-starter-kit/yii2-starter-kit',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-primary">{label}</a>'
                ],
                [
                    'label' => 'Find a bug? (Ru)',
                    'url' => 'https://github.com/yii2-starter-kit/yii2-starter-kit/issues',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-danger">{label}</a>'
                ]
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'items_uz' => json_encode([
                [
                    'label' => 'Get started with Yii2 (Uz)',
                    'url' => 'http://www.yiiframework.com',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-success">{label}</a>'
                ],
                [
                    'label' => 'Yii2 Starter Kit on GitHub (Uz)',
                    'url' => 'https://github.com/yii2-starter-kit/yii2-starter-kit',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-primary">{label}</a>'
                ],
                [
                    'label' => 'Find a bug? (Uz)',
                    'url' => 'https://github.com/yii2-starter-kit/yii2-starter-kit/issues',
                    'options' => ['tag' => 'span'],
                    'template' => '<a href="{url}" class="btn btn-lg btn-danger">{label}</a>'
                ]
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'status' => \common\models\WidgetMenu::STATUS_ACTIVE
        ]);

        $this->insert('{{%widget_text}}', [
            'key' => 'backend_welcome',
            'title' => 'Welcome to backend',
            'title_en' => 'Welcome to backend (En)',
            'title_ru' => 'Welcome to backend (Ru)',
            'title_uz' => 'Welcome to backend (Uz)',
            'body' => '<p>Welcome to Yii2 Starter Kit Dashboard</p>',
            'body_en' => '<p>Welcome to Yii2 Starter Kit Dashboard (En)</p>',
            'body_ru' => '<p>Welcome to Yii2 Starter Kit Dashboard (Ru)</p>',
            'body_uz' => '<p>Welcome to Yii2 Starter Kit Dashboard (Uz)</p>',
            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%widget_text}}', [
            'key' => 'ads-example',
            'title' => 'Google Ads Example Block',
            'title_en' => 'Google Ads Example Block (En)',
            'title_ru' => 'Google Ads Example Block (Ru)',
            'title_uz' => 'Google Ads Example Block (Uz)',
            'body' => '<div class="lead">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9505937224921657"
                     data-ad-slot="2264361777"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>',
            'body_en' => '<div class="lead">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9505937224921657"
                     data-ad-slot="2264361777"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>',
            'body_ru' => '<div class="lead">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9505937224921657"
                     data-ad-slot="2264361777"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>',
            'body_uz' => '<div class="lead">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9505937224921657"
                     data-ad-slot="2264361777"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>',
            'status' => 0,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%widget_carousel}}', [
            'id' => 1,
            'key' => 'index',
            'status' => \common\models\WidgetCarousel::STATUS_ACTIVE
        ]);

        $this->insert('{{%widget_carousel_item}}', [
            'carousel_id' => 1,
            'base_url' => Yii::getAlias('@frontendUrl'),
            'path' => 'img/yii2-starter-kit.gif',
            'type' => 'image/gif',
            'url' => '/',
            'caption' => 'Caption',
            'caption_en' => 'Caption (En)',
            'caption_ru' => 'Caption (Ru)',
            'caption_uz' => 'Caption (Uz)',
            'description' => 'Description',
            'description_en' => 'Description (En)',
            'description_ru' => 'Description (Ru)',
            'description_uz' => 'Description (Uz)',
            'status' => 1
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.theme-skin',
            'value' => 'skin-blue',
            'comment' => 'skin-blue, skin-black, skin-purple, skin-green, skin-red, skin-yellow'
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-fixed',
            'value' => 0
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-boxed',
            'value' => 0
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'backend.layout-collapsed-sidebar',
            'value' => 0
        ]);

        $this->insert('{{%key_storage_item}}', [
            'key' => 'frontend.maintenance',
            'value' => 'disabled',
            'comment' => 'Set it to "enabled" to turn on maintenance mode'
        ]);

    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {
        $this->delete('{{%key_storage_item}}', [
            'key' => 'frontend.maintenance'
        ]);

        $this->delete('{{%key_storage_item}}', [
            'key' => [
                'backend.theme-skin',
                'backend.layout-fixed',
                'backend.layout-boxed',
                'backend.layout-collapsed-sidebar',
            ],
        ]);

        $this->delete('{{%widget_carousel_item}}', [
            'carousel_id' => 1
        ]);

        $this->delete('{{%widget_carousel}}', [
            'id' => 1
        ]);

        $this->delete('{{%widget_text}}', [
            'key' => 'backend_welcome'
        ]);

        $this->delete('{{%widget_menu}}', [
            'key' => 'frontend-index'
        ]);

        $this->delete('{{%article_category}}', [
            'id' => 1
        ]);

        $this->delete('{{%page}}', [
            'slug' => 'about'
        ]);

        $this->delete('{{%user_profile}}', [
            'user_id' => [1, 2, 3]
        ]);

        $this->delete('{{%user}}', [
            'id' => [1, 2, 3]
        ]);
    }
}
