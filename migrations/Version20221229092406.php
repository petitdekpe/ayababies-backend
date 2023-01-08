<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221229092406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE baby (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, birthday DATETIME NOT NULL, town VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, baby_id INT DEFAULT NULL, cover VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, details VARCHAR(255) NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, INDEX IDX_B50A2CB12E288954 (baby_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gift (id INT AUTO_INCREMENT NOT NULL, competition_id INT DEFAULT NULL, partner_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, details VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_A47C990D7B39D312 (competition_id), INDEX IDX_A47C990D9393F8FE (partner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partner (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, details VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB12E288954 FOREIGN KEY (baby_id) REFERENCES baby (id)');
        $this->addSql('ALTER TABLE gift ADD CONSTRAINT FK_A47C990D7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE gift ADD CONSTRAINT FK_A47C990D9393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB12E288954');
        $this->addSql('ALTER TABLE gift DROP FOREIGN KEY FK_A47C990D7B39D312');
        $this->addSql('ALTER TABLE gift DROP FOREIGN KEY FK_A47C990D9393F8FE');
        $this->addSql('DROP TABLE baby');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE gift');
        $this->addSql('DROP TABLE partner');
    }
}
