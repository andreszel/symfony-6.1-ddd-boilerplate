<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221118181606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE data_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE owner_data (id INT AUTO_INCREMENT NOT NULL, owner_id_id INT NOT NULL, data_type_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, post_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, province VARCHAR(255) DEFAULT NULL, nip VARCHAR(40) DEFAULT NULL, regon VARCHAR(40) DEFAULT NULL, phone1 VARCHAR(255) DEFAULT NULL, phone2 VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, INDEX IDX_3B5590F38FDDAB70 (owner_id_id), INDEX IDX_3B5590F3BE7D2379 (data_type_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE owner_data ADD CONSTRAINT FK_3B5590F38FDDAB70 FOREIGN KEY (owner_id_id) REFERENCES owner (id)');
        $this->addSql('ALTER TABLE owner_data ADD CONSTRAINT FK_3B5590F3BE7D2379 FOREIGN KEY (data_type_id_id) REFERENCES data_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE owner_data DROP FOREIGN KEY FK_3B5590F38FDDAB70');
        $this->addSql('ALTER TABLE owner_data DROP FOREIGN KEY FK_3B5590F3BE7D2379');
        $this->addSql('DROP TABLE data_type');
        $this->addSql('DROP TABLE owner_data');
    }
}
