<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231201173733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE program_course (program_id INT NOT NULL, course_id INT NOT NULL, INDEX IDX_42DE51E33EB8070A (program_id), INDEX IDX_42DE51E3591CC992 (course_id), PRIMARY KEY(program_id, course_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE program_course ADD CONSTRAINT FK_42DE51E33EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE program_course ADD CONSTRAINT FK_42DE51E3591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_program DROP FOREIGN KEY FK_9A2E72683EB8070A');
        $this->addSql('ALTER TABLE course_program DROP FOREIGN KEY FK_9A2E7268591CC992');
        $this->addSql('DROP TABLE course_program');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course_program (course_id INT NOT NULL, program_id INT NOT NULL, INDEX IDX_9A2E72683EB8070A (program_id), INDEX IDX_9A2E7268591CC992 (course_id), PRIMARY KEY(course_id, program_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE course_program ADD CONSTRAINT FK_9A2E72683EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_program ADD CONSTRAINT FK_9A2E7268591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE program_course DROP FOREIGN KEY FK_42DE51E33EB8070A');
        $this->addSql('ALTER TABLE program_course DROP FOREIGN KEY FK_42DE51E3591CC992');
        $this->addSql('DROP TABLE program_course');
    }
}
