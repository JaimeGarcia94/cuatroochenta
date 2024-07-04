<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240704102612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE measurement (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, year INT NOT NULL, variety VARCHAR(100) NOT NULL, type VARCHAR(100) NOT NULL, color VARCHAR(50) NOT NULL, temperature DOUBLE PRECISION NOT NULL, graduation DOUBLE PRECISION NOT NULL, ph DOUBLE PRECISION NOT NULL, observations LONGTEXT DEFAULT NULL, INDEX IDX_2CE0D811A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sensor (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, type_sensor_id INT NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_BC8617B0A76ED395 (user_id), INDEX IDX_BC8617B01681D80F (type_sensor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_sensor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE measurement ADD CONSTRAINT FK_2CE0D811A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sensor ADD CONSTRAINT FK_BC8617B0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sensor ADD CONSTRAINT FK_BC8617B01681D80F FOREIGN KEY (type_sensor_id) REFERENCES type_sensor (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE measurement DROP FOREIGN KEY FK_2CE0D811A76ED395');
        $this->addSql('ALTER TABLE sensor DROP FOREIGN KEY FK_BC8617B0A76ED395');
        $this->addSql('ALTER TABLE sensor DROP FOREIGN KEY FK_BC8617B01681D80F');
        $this->addSql('DROP TABLE measurement');
        $this->addSql('DROP TABLE sensor');
        $this->addSql('DROP TABLE type_sensor');
        $this->addSql('DROP TABLE user');
    }
}
