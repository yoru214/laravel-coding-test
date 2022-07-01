<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AppenUserComment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:comment {ID} {Comment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will append a comment to the user.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Validates if values are being pased
        $validator = Validator::make($this->arguments(), [
            'ID' => 'required|integer|exists:users,id',
            'Comment' => 'required'
        ]);

        // Checks if validation fails and shows specific errors
        if ($validator->fails()) {
            $error = $validator->errors();
            echo PHP_EOL;
            foreach($error->messages() as $key => $messages) {
                foreach($messages as $message) {
                    print $message;
                }
            }
            echo PHP_EOL;
        } else {
            print 'Comment Successfully Appended.';
        }
        
        echo PHP_EOL;
        
    }
}
