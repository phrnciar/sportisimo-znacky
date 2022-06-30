<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Model\BrandRepository;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /** @var BrandRepository */
	private $brandRepository;

	public function __construct(BrandRepository $brandRepository)
	{
		$this->brandRepository = $brandRepository;
	}

    /**
	 * Default render with paginator
	 */
    public function renderDefault(int $page = 1, int $itemsPerPage = 5, string $order = "ASC"): void
    {
		$brandsCount = $this->brandRepository->getBrandsCount();

		$paginator = new Nette\Utils\Paginator;
		$paginator->setItemCount($brandsCount); 
		$paginator->setItemsPerPage($itemsPerPage); 
		$paginator->setPage($page); 

		$brands = $this->brandRepository->findBrands($order, $paginator->getLength(), $paginator->getOffset());

		$this->template->brands = $brands;

		$this->template->paginator = $paginator;
    }

    /**
	 * Delete brand AJAX handler
	 */
    public function handleDeleteBrand(string $id): void
    {
        if ($this->isAjax()) {

            $result = $this->brandRepository->deleteBrand($id);   
            $this->flashMessage('Položka byla smazána.');
            $this->sendJson($result);    
        }
    }

    /**
	 * Add new brand AJAX handler
	 */
    public function handleAddBrand(string $brandTitle): void
    {
        if ($this->isAjax()) {

            $result = $this->brandRepository->addBrand($brandTitle);

            $this->sendJson($result);
        }
    }

    /**
	 * Edit brand AJAX handler
	 */
    public function handleEditBrand(string $id, string $brandTitle): void
    {
        if ($this->isAjax()) {

            $result = $this->brandRepository->editBrand($id, $brandTitle);

            $this->sendJson($result);
        }
    }
}
