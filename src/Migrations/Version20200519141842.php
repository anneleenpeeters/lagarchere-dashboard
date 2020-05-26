<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200519141842 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD reservatie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493DE11A7E FOREIGN KEY (reservatie_id) REFERENCES reservatie (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6493DE11A7E ON user (reservatie_id)');
        $this->addSql('DROP INDEX IDX_956EA07F19EB6921 ON reservatie');
        $this->addSql('ALTER TABLE reservatie DROP client_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservatie ADD client_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_956EA07F19EB6921 ON reservatie (client_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493DE11A7E');
        $this->addSql('DROP INDEX IDX_8D93D6493DE11A7E ON user');
        $this->addSql('ALTER TABLE user DROP reservatie_id');
    }
}
