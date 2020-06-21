<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200621181816 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, voornaam VARCHAR(255) NOT NULL, achternaam VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, bericht LONGTEXT NOT NULL, responded TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE locatie CHANGE activiteit_id activiteit_id INT NOT NULL');
        $this->addSql('ALTER TABLE kamer_image CHANGE kamer_id kamer_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservatie CHANGE kamer_id kamer_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE contact');
        $this->addSql('ALTER TABLE kamer_image CHANGE kamer_id kamer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE locatie CHANGE activiteit_id activiteit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservatie CHANGE kamer_id kamer_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
    }
}
