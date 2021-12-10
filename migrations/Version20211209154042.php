<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211209154042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, city VARCHAR(50) NOT NULL, INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE availability (id INT AUTO_INCREMENT NOT NULL, lodging_id INT NOT NULL, startdate DATE NOT NULL, enddate DATE NOT NULL, INDEX IDX_3FB7A2BF87335AF1 (lodging_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lodging (id INT AUTO_INCREMENT NOT NULL, host_id INT NOT NULL, address_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_8D35182A1FB8D185 (host_id), UNIQUE INDEX UNIQ_8D35182AF5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, recipient_id INT NOT NULL, contain LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_B6BD307FF624B39D (sender_id), UNIQUE INDEX UNIQ_B6BD307FE92F8F78 (recipient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, lodging_id INT NOT NULL, title VARCHAR(255) NOT NULL, body LONGTEXT NOT NULL, INDEX IDX_794381C6F675F31B (author_id), INDEX IDX_794381C687335AF1 (lodging_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stay (id INT AUTO_INCREMENT NOT NULL, lodging_id INT NOT NULL, user_id INT NOT NULL, UNIQUE INDEX UNIQ_5E09839C87335AF1 (lodging_id), INDEX IDX_5E09839CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE availability ADD CONSTRAINT FK_3FB7A2BF87335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id)');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182A1FB8D185 FOREIGN KEY (host_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE lodging ADD CONSTRAINT FK_8D35182AF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FE92F8F78 FOREIGN KEY (recipient_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C687335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id)');
        $this->addSql('ALTER TABLE stay ADD CONSTRAINT FK_5E09839C87335AF1 FOREIGN KEY (lodging_id) REFERENCES lodging (id)');
        $this->addSql('ALTER TABLE stay ADD CONSTRAINT FK_5E09839CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182AF5B7AF75');
        $this->addSql('ALTER TABLE availability DROP FOREIGN KEY FK_3FB7A2BF87335AF1');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C687335AF1');
        $this->addSql('ALTER TABLE stay DROP FOREIGN KEY FK_5E09839C87335AF1');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE lodging DROP FOREIGN KEY FK_8D35182A1FB8D185');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FE92F8F78');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6F675F31B');
        $this->addSql('ALTER TABLE stay DROP FOREIGN KEY FK_5E09839CA76ED395');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE availability');
        $this->addSql('DROP TABLE lodging');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE stay');
        $this->addSql('DROP TABLE user');
    }
}
