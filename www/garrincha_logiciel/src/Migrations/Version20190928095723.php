<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190928095723 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categories_test (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, _at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE value_physical_test ADD categories_test_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE value_physical_test ADD CONSTRAINT FK_C7F71DEA3657D5F9 FOREIGN KEY (categories_test_id) REFERENCES categories_test (id)');
        $this->addSql('CREATE INDEX IDX_C7F71DEA3657D5F9 ON value_physical_test (categories_test_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE value_physical_test DROP FOREIGN KEY FK_C7F71DEA3657D5F9');
        $this->addSql('DROP TABLE categories_test');
        $this->addSql('DROP INDEX IDX_C7F71DEA3657D5F9 ON value_physical_test');
        $this->addSql('ALTER TABLE value_physical_test DROP categories_test_id');
    }
}
