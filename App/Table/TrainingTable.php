<?php 


namespace App\Table;

use PDO;
use Exception;
use App\Pagination;
use App\Model\Training;
use App\Model\Categories;

class TrainingTable extends Table {


    public function pagination(?string $order = "posted_date")
    {
        $pagination = new Pagination("SELECT * FROM training ORDER BY {$order} DESC", "SELECT COUNT(id) FROM training", 6, $this->pdo);
        $trainings = $pagination->getItems(Training::class);
        $trainingsById = [];
        foreach($trainings as $training){
            $trainingsById[$training->getId()] = $training;
        }

        $ids = implode(',', array_keys($trainingsById));
        $categories = $this->pdo->query("SELECT c.*, jc.training_id FROM joint_training_category jc JOIN training_categories c ON c.id = jc.category_id WHERE jc.training_id IN ($ids)")->fetchAll(PDO::FETCH_CLASS, Categories::class);

        foreach($categories as $category) {
            $trainingsById[$category->getTraining_id()]->addCategory($category);
        }
        return [$trainings, $pagination];
    }

    public function getLevels() 
    {
        $query = $this->pdo->prepare("SELECT DISTINCT level FROM training ORDER BY FIELD(Level, 'Easy', 'Medium', 'Medium+', 'Hard', 'Hard+')");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_NUM);
    } 

}