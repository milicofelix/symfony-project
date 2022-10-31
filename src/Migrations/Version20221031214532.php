<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031214532 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F12469DE2');
        $this->addSql('CREATE TABLE raca (id INT AUTO_INCREMENT NOT NULL, especie_id INT DEFAULT NULL, nome VARCHAR(50) NOT NULL, INDEX IDX_DD027FB6E70ED95B (especie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE endereco (id INT AUTO_INCREMENT NOT NULL, rua VARCHAR(150) NOT NULL, numero VARCHAR(20) NOT NULL, bairro VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, endereco_id INT DEFAULT NULL, nome VARCHAR(50) NOT NULL, telefone VARCHAR(20) NOT NULL, email VARCHAR(130) NOT NULL, INDEX IDX_F41C9B251BB76823 (endereco_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animal_cliente (cliente_id INT NOT NULL, animal_id INT NOT NULL, INDEX IDX_7BC3F41FDE734E51 (cliente_id), INDEX IDX_7BC3F41F8E962C16 (animal_id), PRIMARY KEY(cliente_id, animal_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, raca_id INT DEFAULT NULL, nome VARCHAR(50) NOT NULL, data_nascimento DATE NOT NULL, INDEX IDX_6AAB231FE13B435A (raca_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE especie (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE raca ADD CONSTRAINT FK_DD027FB6E70ED95B FOREIGN KEY (especie_id) REFERENCES especie (id)');
        $this->addSql('ALTER TABLE cliente ADD CONSTRAINT FK_F41C9B251BB76823 FOREIGN KEY (endereco_id) REFERENCES endereco (id)');
        $this->addSql('ALTER TABLE animal_cliente ADD CONSTRAINT FK_7BC3F41FDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal_cliente ADD CONSTRAINT FK_7BC3F41F8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FE13B435A FOREIGN KEY (raca_id) REFERENCES raca (id)');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE movie');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FE13B435A');
        $this->addSql('ALTER TABLE cliente DROP FOREIGN KEY FK_F41C9B251BB76823');
        $this->addSql('ALTER TABLE animal_cliente DROP FOREIGN KEY FK_7BC3F41FDE734E51');
        $this->addSql('ALTER TABLE animal_cliente DROP FOREIGN KEY FK_7BC3F41F8E962C16');
        $this->addSql('ALTER TABLE raca DROP FOREIGN KEY FK_DD027FB6E70ED95B');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, release_date DATE NOT NULL, INDEX IDX_1D5EF26F12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE raca');
        $this->addSql('DROP TABLE endereco');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE animal_cliente');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE especie');
    }
}
