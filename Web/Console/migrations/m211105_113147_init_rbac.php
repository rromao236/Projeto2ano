<?php

use yii\db\Migration;
use yii\rbac\Rule;

/**
 * Class m211105_113147_init_rbac
 */
class m211105_113147_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;


        //PERMISSONS


        /* add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);*/

        // add "updateProfile" permission
        /*$updateProfile = $auth->createPermission('updateProfile');
        $updateProfile->description = 'Update profile';
        $auth->add($updateProfile);*/

        /*add "backoffice" permission
        $backoffice = $auth->createPermission('backoffice');
        $backoffice->description = 'acesses backoffice';
        $auth->add($backoffice);*/


        //RULES


        /*$rule = new \app\rbac\UserRule;
        $auth->add($rule);

        // add the "updateOwnPost" permission and associate the rule with it.
        $updateOwnProfile = $auth->createPermission('updateOwnProfile');
        $updateOwnProfile->description = 'Update own profile';
        $updateOwnProfile->ruleName = $rule->name;
        $auth->add($updateOwnProfile);

        // "updateOwnPost" will be used from "updatePost"
        $auth->addChild($updateOwnProfile, $updateProfile);*/



        //ROLES


        // add "author" role and give this role the "createPost" permission
        $user = $auth->createRole('user');
        $auth->add($user);
        //$auth->addChild($user, $createPost);
        //$auth->addChild($user, $updateOwnProfile);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $backoffice);
        //$auth->addChild($admin, $updateProfile);
        //$auth->addChild($admin, $user);


        //Ids dos ROLES


        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($user, 2);
        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211105_113147_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211105_113147_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
