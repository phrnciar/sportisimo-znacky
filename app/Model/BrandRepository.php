<?php

namespace App\Model;

use Nette;
use Nette\Database\UniqueConstraintViolationException;

class BrandRepository
{
	use Nette\SmartObject;

	/** @var Nette\Database\Connection */
	private $database;

	public function __construct(Nette\Database\Connection $database)
	{
		$this->database = $database;
	}

    /**
	 * Get all brands from database
	 */
	public function findAllBrands(): Nette\Database\ResultSet
	{
		return $this->database->query('
			SELECT * FROM brands
			ORDER BY title ASC'
		);
	}

    /**
	 * Get brands for one page
	 */

    public function findBrands(string $order, int $limit, int $offset): Nette\Database\ResultSet
	{
		return $this->database->query('
			SELECT * FROM brands
			ORDER BY title '.$order.'
			LIMIT ?
			OFFSET ?',
			$limit, $offset
		);
	}

    /**
	 * Add new brand into database
	 */

    public function addBrand(string $brandTitle): int|Nette\Database\UniqueConstraintViolationException
    {
        try {
            $this->database->query('INSERT INTO brands ?', ['title' => $brandTitle]);

            return $this->database->getInsertId();

        } catch (UniqueConstraintViolationException $error) {
            
            return $error;
        }
    }

    /**
	 * Update brand from database
	 */
    public function editBrand(string $id, string $brandTitle): int|Nette\Database\UniqueConstraintViolationException
    {
        try {
            $result = $this->database->query('UPDATE brands SET', ['title' => $brandTitle], 'WHERE id = ?', $id);

            return $result->getRowCount();

        } catch (UniqueConstraintViolationException $error) {
            
            return $error;
        }
    }

    /**
	 * Delete brand from database
	 */
    public function deleteBrand(string $id): int
    {
        $result = $this->database->query('DELETE FROM brands WHERE id = ?', $id);

        return $result->getRowCount();
    }

    /**
	 * Returns the total number of brands
	 */
	public function getBrandsCount(): int
	{
		return $this->database->fetchField('SELECT COUNT(*) FROM brands');
	}
}
