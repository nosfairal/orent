<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220830115445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_famille (id INT AUTO_INCREMENT NOT NULL, famille_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_77A8A5E97A77B84 (famille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_sous_famille (id INT AUTO_INCREMENT NOT NULL, sous_famille_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_B8EAD23B71DF2E6E (sous_famille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sous_famille ADD CONSTRAINT FK_77A8A5E97A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('ALTER TABLE sous_sous_famille ADD CONSTRAINT FK_B8EAD23B71DF2E6E FOREIGN KEY (sous_famille_id) REFERENCES sous_famille (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_famille DROP FOREIGN KEY FK_77A8A5E97A77B84');
        $this->addSql('ALTER TABLE sous_sous_famille DROP FOREIGN KEY FK_B8EAD23B71DF2E6E');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE sous_famille');
        $this->addSql('DROP TABLE sous_sous_famille');
    }
}
