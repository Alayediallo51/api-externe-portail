<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231201160200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE level ADD cycle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE level ADD CONSTRAINT FK_9AEACC135EC1162 FOREIGN KEY (cycle_id) REFERENCES cycle (id)');
        $this->addSql('CREATE INDEX IDX_9AEACC135EC1162 ON level (cycle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE level DROP FOREIGN KEY FK_9AEACC135EC1162');
        $this->addSql('DROP INDEX IDX_9AEACC135EC1162 ON level');
        $this->addSql('ALTER TABLE level DROP cycle_id');
    }
}
