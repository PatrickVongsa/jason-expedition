<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211101173307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE applier (id INT AUTO_INCREMENT NOT NULL, gender_id INT NOT NULL, profession_id INT NOT NULL, warrior_skill_id INT NOT NULL, navigation_skill_id INT NOT NULL, weapon_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, age INT NOT NULL, height INT NOT NULL, origin VARCHAR(255) NOT NULL, INDEX IDX_D22A42C7708A0E0 (gender_id), INDEX IDX_D22A42C7FDEF8996 (profession_id), INDEX IDX_D22A42C7FD6FD15B (warrior_skill_id), INDEX IDX_D22A42C79CCF63CA (navigation_skill_id), INDEX IDX_D22A42C795B82273 (weapon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, experience VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, gender VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession (id INT AUTO_INCREMENT NOT NULL, profession VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon (id INT AUTO_INCREMENT NOT NULL, weapon VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE applier ADD CONSTRAINT FK_D22A42C7708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE applier ADD CONSTRAINT FK_D22A42C7FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id)');
        $this->addSql('ALTER TABLE applier ADD CONSTRAINT FK_D22A42C7FD6FD15B FOREIGN KEY (warrior_skill_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE applier ADD CONSTRAINT FK_D22A42C79CCF63CA FOREIGN KEY (navigation_skill_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE applier ADD CONSTRAINT FK_D22A42C795B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applier DROP FOREIGN KEY FK_D22A42C7FD6FD15B');
        $this->addSql('ALTER TABLE applier DROP FOREIGN KEY FK_D22A42C79CCF63CA');
        $this->addSql('ALTER TABLE applier DROP FOREIGN KEY FK_D22A42C7708A0E0');
        $this->addSql('ALTER TABLE applier DROP FOREIGN KEY FK_D22A42C7FDEF8996');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE applier DROP FOREIGN KEY FK_D22A42C795B82273');
        $this->addSql('DROP TABLE applier');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE profession');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE weapon');
    }
}
