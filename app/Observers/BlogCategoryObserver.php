<?php

namespace App\Observers;

use App\Models\BlogCategory;
use Carbon\Carbon;
class BlogCategoryObserver
{
 /**
     * Обробка перед створенням запису.
     *
     * @param  BlogCategory  $blogCategory
     *
     */
    public function creating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }

    public function updating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }
    /**
     * якщо псевдонім порожній
     * то генеруємо псевдонім
     *
     * @param BlogCategory  $blogCategory
     */
    protected function setSlug(BlogCategory $blogCategory)
    {
        if (empty($blogCategory->slug)) {
            $blogCategory->slug = Str::slug($blogCategory->title);
        }
    }
/**
     * Обробка перед оновленням запису.
     *
     * @param  BlogPost  $blogPost
     *
     */
    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);

        $this->setSlug($blogPost);
    }

    /**
     * якщо поле published_at порожнє і нам прийшло 1 в ключі is_published,
     * то генеруємо поточну дату
     *
     * @param BlogPost $blogPost
     */
    protected function setPublishedAt(BlogPost $blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }

    /**
     * якщо псевдонім порожній
     * то генеруємо псевдонім
     *
     * @param BlogPost $blogPost
     */
    protected function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = \Str::slug($blogPost->title);
        }
    }
    /**
     * Handle the BlogCategory "created" event.
     */
    public function created(BlogCategory $blogCategory): void
    {
        //
    }

    /**
     * Handle the BlogCategory "updated" event.
     */
    public function updated(BlogCategory $blogCategory): void
    {
        //
    }

    /**
     * Handle the BlogCategory "deleted" event.
     */
    public function deleted(BlogCategory $blogCategory): void
    {
        //
    }

    /**
     * Handle the BlogCategory "restored" event.
     */
    public function restored(BlogCategory $blogCategory): void
    {
        //
    }

    /**
     * Handle the BlogCategory "force deleted" event.
     */
    public function forceDeleted(BlogCategory $blogCategory): void
    {
        //
    }
}
