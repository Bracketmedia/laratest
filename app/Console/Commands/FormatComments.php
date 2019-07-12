<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Comment;

class FormatComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'formatcomments {function : a name of funcition of strings}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description =
        'Runs a function to all of "comment" fields of table "comments"'."\n".
        'for example:'."\n".
        'php artisan formatcomments ucwords'."\n".
        'php artisan formatcomments ucfirst'."\n".
        'php artisan formatcomments strtoupper'."\n".
        'php artisan formatcomments strtolower'."\n".
        'php artisan formatcomments ucwords'
    ;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $comments = Comment::all();
        foreach ($comments as $comment) {
            $function = $this->argument('function');
            print $function . " -> ";
            $comment->comment = $function($comment->comment);
            print $comment->comment."\n";
            $comment->save();
        }
    }
}
