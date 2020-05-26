<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200517175329 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservatie ADD kamer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservatie ADD CONSTRAINT FK_956EA07F78ECB459 FOREIGN KEY (kamer_id) REFERENCES kamer (id)');
        $this->addSql('CREATE INDEX IDX_956EA07F78ECB459 ON reservatie (kamer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservatie DROP FOREIGN KEY FK_956EA07F78ECB459');
        $this->addSql('DROP INDEX IDX_956EA07F78ECB459 ON reservatie');
        $this->addSql('ALTER TABLE reservatie DROP kamer_id');
    }
}
