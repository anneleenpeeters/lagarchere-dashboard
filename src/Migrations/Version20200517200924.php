<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200517200924 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE kamer_image ADD kamer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE kamer_image ADD CONSTRAINT FK_96408F9078ECB459 FOREIGN KEY (kamer_id) REFERENCES kamer (id)');
        $this->addSql('CREATE INDEX IDX_96408F9078ECB459 ON kamer_image (kamer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE kamer_image DROP FOREIGN KEY FK_96408F9078ECB459');
        $this->addSql('DROP INDEX IDX_96408F9078ECB459 ON kamer_image');
        $this->addSql('ALTER TABLE kamer_image DROP kamer_id');
    }
}
