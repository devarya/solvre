<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20160130163912 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE field (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_5BF54558166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE field_operation (field_id INT NOT NULL, operation_id INT NOT NULL, INDEX IDX_FC8220E7443707B0 (field_id), INDEX IDX_FC8220E744AC3583 (operation_id), PRIMARY KEY(field_id, operation_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deployment_plan (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_71733FBA166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issue_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image_path VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_in_projects (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, user_id INT DEFAULT NULL, project_role VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_ECDFF30A166D1F9C (project_id), INDEX IDX_ECDFF30AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dashboard (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_5C94FFF8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kanban_board (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_AA902B95A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification_templates (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_C9C13AD1166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sprint (id INT AUTO_INCREMENT NOT NULL, version_id INT DEFAULT NULL, agile_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, UNIQUE INDEX UNIQ_EF8055B74BBC2705 (version_id), INDEX IDX_EF8055B7D1B3D2EA (agile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operations (id INT AUTO_INCREMENT NOT NULL, transition_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_281453488BF1A064 (transition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation_fields (operation_id INT NOT NULL, field_id INT NOT NULL, INDEX IDX_3655AEA44AC3583 (operation_id), INDEX IDX_3655AEA443707B0 (field_id), PRIMARY KEY(operation_id, field_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan_tasks (id INT AUTO_INCREMENT NOT NULL, stage_id INT DEFAULT NULL, plan_task_type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_3FE206B2298D193 (stage_id), INDEX IDX_3FE206B39A771 (plan_task_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan_task_types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, permissions VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agile_board (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_440602CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transition (id INT AUTO_INCREMENT NOT NULL, workflow_id INT DEFAULT NULL, from_status_id INT DEFAULT NULL, to_status_id INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_F715A75A2C7C2CBA (workflow_id), UNIQUE INDEX UNIQ_F715A75A7B6B9507 (from_status_id), UNIQUE INDEX UNIQ_F715A75A5A54D7CC (to_status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workflow (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, UNIQUE INDEX UNIQ_65C59816166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, password VARCHAR(255) NOT NULL, remember_token VARCHAR(255) DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, avatar VARCHAR(255) NOT NULL, INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, `key` VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE server (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, port VARCHAR(255) NOT NULL, connection_type VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE server_plans (server_id INT NOT NULL, plan_id INT NOT NULL, INDEX IDX_95E6FAD81844E6B7 (server_id), INDEX IDX_95E6FAD8E899029B (plan_id), PRIMARY KEY(server_id, plan_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diagram_package (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, plan_id INT DEFAULT NULL, INDEX IDX_C27C9369E899029B (plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE widget (id INT AUTO_INCREMENT NOT NULL, dashboard_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_85F91ED0B9D04D2B (dashboard_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diagram (id INT AUTO_INCREMENT NOT NULL, diagram_package_id INT DEFAULT NULL, diagram_category_id INT DEFAULT NULL, project_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_D75D83604524A699 (diagram_package_id), INDEX IDX_D75D8360B6263182 (diagram_category_id), INDEX IDX_D75D8360166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issue (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, sprint_id INT DEFAULT NULL, status_id INT DEFAULT NULL, issue_type_id INT DEFAULT NULL, user_id INT DEFAULT NULL, number VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_12AD233E166D1F9C (project_id), INDEX IDX_12AD233E8C24077B (sprint_id), INDEX IDX_12AD233E6BF700BD (status_id), INDEX IDX_12AD233E60B4C972 (issue_type_id), INDEX IDX_12AD233EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issue_versions (issue_id INT NOT NULL, version_id INT NOT NULL, INDEX IDX_CE746A795E7AA58C (issue_id), INDEX IDX_CE746A794BBC2705 (version_id), PRIMARY KEY(issue_id, version_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE version (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, release_date DATETIME NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_BF1CD3C3166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE build_plan (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_DA263697166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diagram_category (id INT AUTO_INCREMENT NOT NULL, parent_category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_E462FBDC796A8F92 (parent_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, issue_id INT DEFAULT NULL, user_id INT DEFAULT NULL, content VARCHAR(255) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_9474526C5E7AA58C (issue_id), INDEX IDX_9474526CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notifications (id INT AUTO_INCREMENT NOT NULL, notification_template_id INT DEFAULT NULL, user_id INT DEFAULT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, created_by DATETIME NOT NULL, updated_by DATETIME NOT NULL, INDEX IDX_6000B0D3D0413CF9 (notification_template_id), INDEX IDX_6000B0D3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE field ADD CONSTRAINT FK_5BF54558166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE field_operation ADD CONSTRAINT FK_FC8220E7443707B0 FOREIGN KEY (field_id) REFERENCES field (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE field_operation ADD CONSTRAINT FK_FC8220E744AC3583 FOREIGN KEY (operation_id) REFERENCES operations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deployment_plan ADD CONSTRAINT FK_71733FBA166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE users_in_projects ADD CONSTRAINT FK_ECDFF30A166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE users_in_projects ADD CONSTRAINT FK_ECDFF30AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE dashboard ADD CONSTRAINT FK_5C94FFF8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE kanban_board ADD CONSTRAINT FK_AA902B95A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification_templates ADD CONSTRAINT FK_C9C13AD1166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE sprint ADD CONSTRAINT FK_EF8055B74BBC2705 FOREIGN KEY (version_id) REFERENCES version (id)');
        $this->addSql('ALTER TABLE sprint ADD CONSTRAINT FK_EF8055B7D1B3D2EA FOREIGN KEY (agile_id) REFERENCES agile_board (id)');
        $this->addSql('ALTER TABLE operations ADD CONSTRAINT FK_281453488BF1A064 FOREIGN KEY (transition_id) REFERENCES transition (id)');
        $this->addSql('ALTER TABLE operation_fields ADD CONSTRAINT FK_3655AEA44AC3583 FOREIGN KEY (operation_id) REFERENCES operations (id)');
        $this->addSql('ALTER TABLE operation_fields ADD CONSTRAINT FK_3655AEA443707B0 FOREIGN KEY (field_id) REFERENCES field (id)');
        $this->addSql('ALTER TABLE plan_tasks ADD CONSTRAINT FK_3FE206B2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE plan_tasks ADD CONSTRAINT FK_3FE206B39A771 FOREIGN KEY (plan_task_type_id) REFERENCES plan_task_types (id)');
        $this->addSql('ALTER TABLE agile_board ADD CONSTRAINT FK_440602CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transition ADD CONSTRAINT FK_F715A75A2C7C2CBA FOREIGN KEY (workflow_id) REFERENCES workflow (id)');
        $this->addSql('ALTER TABLE transition ADD CONSTRAINT FK_F715A75A7B6B9507 FOREIGN KEY (from_status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE transition ADD CONSTRAINT FK_F715A75A5A54D7CC FOREIGN KEY (to_status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE workflow ADD CONSTRAINT FK_65C59816166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE server_plans ADD CONSTRAINT FK_95E6FAD81844E6B7 FOREIGN KEY (server_id) REFERENCES server (id)');
        $this->addSql('ALTER TABLE widget ADD CONSTRAINT FK_85F91ED0B9D04D2B FOREIGN KEY (dashboard_id) REFERENCES dashboard (id)');
        $this->addSql('ALTER TABLE diagram ADD CONSTRAINT FK_D75D83604524A699 FOREIGN KEY (diagram_package_id) REFERENCES diagram_package (id)');
        $this->addSql('ALTER TABLE diagram ADD CONSTRAINT FK_D75D8360B6263182 FOREIGN KEY (diagram_category_id) REFERENCES diagram_category (id)');
        $this->addSql('ALTER TABLE diagram ADD CONSTRAINT FK_D75D8360166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE issue ADD CONSTRAINT FK_12AD233E166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE issue ADD CONSTRAINT FK_12AD233E8C24077B FOREIGN KEY (sprint_id) REFERENCES sprint (id)');
        $this->addSql('ALTER TABLE issue ADD CONSTRAINT FK_12AD233E6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE issue ADD CONSTRAINT FK_12AD233E60B4C972 FOREIGN KEY (issue_type_id) REFERENCES issue_type (id)');
        $this->addSql('ALTER TABLE issue ADD CONSTRAINT FK_12AD233EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE issue_versions ADD CONSTRAINT FK_CE746A795E7AA58C FOREIGN KEY (issue_id) REFERENCES issue (id)');
        $this->addSql('ALTER TABLE issue_versions ADD CONSTRAINT FK_CE746A794BBC2705 FOREIGN KEY (version_id) REFERENCES version (id)');
        $this->addSql('ALTER TABLE version ADD CONSTRAINT FK_BF1CD3C3166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE build_plan ADD CONSTRAINT FK_DA263697166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE diagram_category ADD CONSTRAINT FK_E462FBDC796A8F92 FOREIGN KEY (parent_category_id) REFERENCES diagram_category (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C5E7AA58C FOREIGN KEY (issue_id) REFERENCES issue (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3D0413CF9 FOREIGN KEY (notification_template_id) REFERENCES notification_templates (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE field_operation DROP FOREIGN KEY FK_FC8220E7443707B0');
        $this->addSql('ALTER TABLE operation_fields DROP FOREIGN KEY FK_3655AEA443707B0');
        $this->addSql('ALTER TABLE issue DROP FOREIGN KEY FK_12AD233E60B4C972');
        $this->addSql('ALTER TABLE widget DROP FOREIGN KEY FK_85F91ED0B9D04D2B');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3D0413CF9');
        $this->addSql('ALTER TABLE issue DROP FOREIGN KEY FK_12AD233E8C24077B');
        $this->addSql('ALTER TABLE field_operation DROP FOREIGN KEY FK_FC8220E744AC3583');
        $this->addSql('ALTER TABLE operation_fields DROP FOREIGN KEY FK_3655AEA44AC3583');
        $this->addSql('ALTER TABLE transition DROP FOREIGN KEY FK_F715A75A7B6B9507');
        $this->addSql('ALTER TABLE transition DROP FOREIGN KEY FK_F715A75A5A54D7CC');
        $this->addSql('ALTER TABLE issue DROP FOREIGN KEY FK_12AD233E6BF700BD');
        $this->addSql('ALTER TABLE plan_tasks DROP FOREIGN KEY FK_3FE206B39A771');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE sprint DROP FOREIGN KEY FK_EF8055B7D1B3D2EA');
        $this->addSql('ALTER TABLE operations DROP FOREIGN KEY FK_281453488BF1A064');
        $this->addSql('ALTER TABLE transition DROP FOREIGN KEY FK_F715A75A2C7C2CBA');
        $this->addSql('ALTER TABLE users_in_projects DROP FOREIGN KEY FK_ECDFF30AA76ED395');
        $this->addSql('ALTER TABLE dashboard DROP FOREIGN KEY FK_5C94FFF8A76ED395');
        $this->addSql('ALTER TABLE kanban_board DROP FOREIGN KEY FK_AA902B95A76ED395');
        $this->addSql('ALTER TABLE agile_board DROP FOREIGN KEY FK_440602CA76ED395');
        $this->addSql('ALTER TABLE issue DROP FOREIGN KEY FK_12AD233EA76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3A76ED395');
        $this->addSql('ALTER TABLE field DROP FOREIGN KEY FK_5BF54558166D1F9C');
        $this->addSql('ALTER TABLE deployment_plan DROP FOREIGN KEY FK_71733FBA166D1F9C');
        $this->addSql('ALTER TABLE users_in_projects DROP FOREIGN KEY FK_ECDFF30A166D1F9C');
        $this->addSql('ALTER TABLE notification_templates DROP FOREIGN KEY FK_C9C13AD1166D1F9C');
        $this->addSql('ALTER TABLE workflow DROP FOREIGN KEY FK_65C59816166D1F9C');
        $this->addSql('ALTER TABLE diagram DROP FOREIGN KEY FK_D75D8360166D1F9C');
        $this->addSql('ALTER TABLE issue DROP FOREIGN KEY FK_12AD233E166D1F9C');
        $this->addSql('ALTER TABLE version DROP FOREIGN KEY FK_BF1CD3C3166D1F9C');
        $this->addSql('ALTER TABLE build_plan DROP FOREIGN KEY FK_DA263697166D1F9C');
        $this->addSql('ALTER TABLE server_plans DROP FOREIGN KEY FK_95E6FAD81844E6B7');
        $this->addSql('ALTER TABLE diagram DROP FOREIGN KEY FK_D75D83604524A699');
        $this->addSql('ALTER TABLE plan_tasks DROP FOREIGN KEY FK_3FE206B2298D193');
        $this->addSql('ALTER TABLE issue_versions DROP FOREIGN KEY FK_CE746A795E7AA58C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C5E7AA58C');
        $this->addSql('ALTER TABLE sprint DROP FOREIGN KEY FK_EF8055B74BBC2705');
        $this->addSql('ALTER TABLE issue_versions DROP FOREIGN KEY FK_CE746A794BBC2705');
        $this->addSql('ALTER TABLE diagram DROP FOREIGN KEY FK_D75D8360B6263182');
        $this->addSql('ALTER TABLE diagram_category DROP FOREIGN KEY FK_E462FBDC796A8F92');
        $this->addSql('DROP TABLE field');
        $this->addSql('DROP TABLE field_operation');
        $this->addSql('DROP TABLE deployment_plan');
        $this->addSql('DROP TABLE issue_type');
        $this->addSql('DROP TABLE users_in_projects');
        $this->addSql('DROP TABLE dashboard');
        $this->addSql('DROP TABLE kanban_board');
        $this->addSql('DROP TABLE notification_templates');
        $this->addSql('DROP TABLE sprint');
        $this->addSql('DROP TABLE operations');
        $this->addSql('DROP TABLE operation_fields');
        $this->addSql('DROP TABLE plan_tasks');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE plan_task_types');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE agile_board');
        $this->addSql('DROP TABLE transition');
        $this->addSql('DROP TABLE workflow');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE server');
        $this->addSql('DROP TABLE server_plans');
        $this->addSql('DROP TABLE diagram_package');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE widget');
        $this->addSql('DROP TABLE diagram');
        $this->addSql('DROP TABLE issue');
        $this->addSql('DROP TABLE issue_versions');
        $this->addSql('DROP TABLE version');
        $this->addSql('DROP TABLE build_plan');
        $this->addSql('DROP TABLE diagram_category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE notifications');
    }
}
