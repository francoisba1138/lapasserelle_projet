<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211210131913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specification (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specification_lodging (specification_id INT NOT NULL, lodging_id INT NOT NULL, INDEX IDX_CE8F99F7908E2FFE (specification_id), INDEX IDX_CE8F99F787335AF1 (lodging_id), PRIMARY KEY(specification_id, lodging_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specification_lodging ADD CONSTRAINT FK_CE8F99F7908E2FFE FOREIGN KEY (specification_id) REFERENCES specification (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specification_lodging ADD CONSTRAINT FK_CE8F99F787335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specification_lodging DROP FOREIGN KEY FK_CE8F99F7908E2FFE');
        $this->addSql('DROP TABLE specification');
        $this->addSql('DROP TABLE specification_lodging');
    }
}
