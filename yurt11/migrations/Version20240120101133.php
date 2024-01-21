<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240120101133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE room_student_mapp (id INT AUTO_INCREMENT NOT NULL, tc VARCHAR(200) NOT NULL, room_number VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE room_student_map DROP FOREIGN KEY room_student_map_ibfk_1');
        $this->addSql('DROP INDEX room_id ON room_student_map');
        $this->addSql('DROP INDEX room_student_map_ibfk_1 ON room_student_map');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE room_student_mapp');
        $this->addSql('ALTER TABLE room_student_map ADD CONSTRAINT room_student_map_ibfk_1 FOREIGN KEY (student_id) REFERENCES student_tbl (id)');
        $this->addSql('CREATE INDEX room_id ON room_student_map (room_id)');
        $this->addSql('CREATE INDEX room_student_map_ibfk_1 ON room_student_map (student_id)');
    }
}
