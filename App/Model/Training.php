<?php 

namespace App\Model;

use App\Helpers\Text;
use DateTime;

class Training {


        private $id;
        private $title;
        private $slug;
        private $description;
        private $level;
        private $length;
        private $views;
        private $posted_date;
        private $categories = [];



        public function getId(): ?int
        {
                return $this->id;
        }

        public function setId($id): ?self
        {
                $this->id = $id;

                return $this;
        }

        public function getTitle(): ?string
        {
                return $this->title;
        }

        public function setTitle($title): ?self
        {
                $this->title = $title;

                return $this;
        }

        public function getSlug(): ?string
        {
                return $this->slug;
        }

        public function setSlug($slug): ?self
        {
                $this->slug = $slug;

                return $this;
        }

        public function getDescription(): ?string
        {
                return nl2br(e($this->description));
        }

        public function setDescription($description): ?self
        {
                $this->description = $description;

                return $this;
        }

        public function getLength()
        {
                return $this->length;
        }

        public function setLength($length): ?self
        {
                $this->length = $length;

                return $this;
        }

        public function getViews(): ?int
        {
                return $this->views;
        }
 
        public function setViews($views): ?self
        {
                $this->views = $views;

                return $this;
        }
 
        public function getPosted_date(): ?string
        {
                $date = new DateTime($this->posted_date);
                return $date->format('d M Y');
        }

        public function setPosted_date($posted_date): ?self
        {
                $this->posted_date = $posted_date;

                return $this;
        }

        public function getShortDescription(): ?string
        {
            if($this->description === null){
                return null;
            }else {
                return nl2br(e(Text::excerpt($this->description, 140)));
            }
        }

        public function getShortTitle(): ?string 
        {
            if($this->title === null){
                return null;
            }else{
                return e(Text::excerpt($this->title, 13));
            }
        }

        public function getLevel(): ?string
        {
                return $this->level;
        }

        public function setLevel($level): ?self
        {
                $this->level = $level;

                return $this;
        }

        /**
         * @return Category[]
         */
        public function getCategories(): array 
        {
                return $this->categories;
        }

        public function addCategory(Categories $category): void 
        {
                $this->categories[] = $category;
                $category->setTraining($this);
        }
}