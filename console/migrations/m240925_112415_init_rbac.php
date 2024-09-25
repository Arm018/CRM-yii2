<?php

use yii\db\Migration;
use yii\rbac\DbManager;

/**
 * Class m240925_112415_init_rbac
 */
class m240925_112415_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $user = $auth->createRole('user');
        $auth->add($user);

    }

    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240925_112415_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
