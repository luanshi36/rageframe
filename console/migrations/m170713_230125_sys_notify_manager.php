<?php

use yii\db\Migration;

class m170713_230125_sys_notify_manager extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%sys_notify_manager}}', [
            'id' => 'int(10) NOT NULL AUTO_INCREMENT',
            'manager_id' => 'int(10) NOT NULL',
            'last_announce_time' => 'int(10) NULL DEFAULT \'0\' COMMENT \'最后一次公告消息\'',
            'last_message_time' => 'int(10) NULL DEFAULT \'0\' COMMENT \'最后一次私信提醒消息\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='消息已读管理表'");
        
        /* 索引设置 */
        
        
        /* 表数据 */
        $this->insert('{{%sys_notify_manager}}',['id'=>'3','manager_id'=>'1','last_announce_time'=>'0','last_message_time'=>'0']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%sys_notify_manager}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

