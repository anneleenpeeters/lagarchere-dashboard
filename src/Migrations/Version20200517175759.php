<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200517175759 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dienst (id INT AUTO_INCREMENT NOT NULL, omschrijving VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dienst_kamer (dienst_id INT NOT NULL, kamer_id INT NOT NULL, INDEX IDX_94A175757DC308 (dienst_id), INDEX IDX_94A1757578ECB459 (kamer_id), PRIMARY KEY(dienst_id, kamer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dienst_kamer ADD CONSTRAINT FK_94A175757DC308 FOREIGN KEY (dienst_id) REFERENCES dienst (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dienst_kamer ADD CONSTRAINT FK_94A1757578ECB459 FOREIGN KEY (kamer_id) REFERENCES kamer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dienst_kamer DROP FOREIGN KEY FK_94A175757DC308');
        $this->addSql('DROP TABLE dienst');
        $this->addSql('DROP TABLE dienst_kamer');
    }
}
