<?php

use yii\db\Migration;

class m170808_064553_add_npo_as_draft extends Migration {

    public function up() {  
        $this->addColumn('Organization', 'As_Draft', $this->boolean());
    }

    public function down() {
        $this->addColumn('Organization', 'As_Draft', $this->boolean());
    }

    

    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
