<?php

use yii\db\Migration;

class m170713_230125_sys_tag_map extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%sys_tag_map}}', [
            'tag_id' => 'int(10) NULL',
            'article_id' => 'int(10) NULL',
        ], "ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章标签关联表'");
        
        /* 索引设置 */
        $this->createIndex('tag_id','{{%sys_tag_map}}','tag_id',0);
        $this->createIndex('article_id','{{%sys_tag_map}}','article_id',0);
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%sys_tag_map}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

