<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231201151555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_program (course_id INT NOT NULL, program_id INT NOT NULL, INDEX IDX_9A2E7268591CC992 (course_id), INDEX IDX_9A2E72683EB8070A (program_id), PRIMARY KEY(course_id, program_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course_program ADD CONSTRAINT FK_9A2E7268591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_program ADD CONSTRAINT FK_9A2E72683EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course_program DROP FOREIGN KEY FK_9A2E7268591CC992');
        $this->addSql('ALTER TABLE course_program DROP FOREIGN KEY FK_9A2E72683EB8070A');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_program');
    }
}
