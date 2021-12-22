<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211222145026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity_lodging (activity_id INT NOT NULL, lodging_id INT NOT NULL, INDEX IDX_8D676ECA81C06096 (activity_id), INDEX IDX_8D676ECA87335AF1 (lodging_id), PRIMARY KEY(activity_id, lodging_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lodging_activity (lodging_id INT NOT NULL, activity_id INT NOT NULL, INDEX IDX_6240E36A87335AF1 (lodging_id), INDEX IDX_6240E36A81C06096 (activity_id), PRIMARY KEY(lodging_id, activity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity_lodging ADD CONSTRAINT FK_8D676ECA81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activity_lodging ADD CONSTRAINT FK_8D676ECA87335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lodging_activity ADD CONSTRAINT FK_6240E36A87335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lodging_activity ADD CONSTRAINT FK_6240E36A81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A87335AF1');
        $this->addSql('DROP INDEX IDX_AC74095A87335AF1 ON activity');
        $this->addSql('ALTER TABLE activity DROP lodging_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE activity_lodging');
        $this->addSql('DROP TABLE lodging_activity');
        $this->addSql('ALTER TABLE activity ADD lodging_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A87335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id)');
        $this->addSql('CREATE INDEX IDX_AC74095A87335AF1 ON activity (lodging_id)');
    }
}
