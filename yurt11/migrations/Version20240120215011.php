<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240120215011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE room_student_mapp (id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, room_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP INDEX room_number ON room_tbl');
        $this->addSql('DROP INDEX room_number_2 ON room_tbl');
        $this->addSql('DROP INDEX room_number_3 ON room_tbl');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE room_student_mapp');
        $this->addSql('CREATE INDEX room_number ON room_tbl (room_number)');
        $this->addSql('CREATE INDEX room_number_2 ON room_tbl (room_number)');
        $this->addSql('CREATE INDEX room_number_3 ON room_tbl (room_number)');
    }
}
