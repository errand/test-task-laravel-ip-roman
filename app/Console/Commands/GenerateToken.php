<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class GenerateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:generate {login} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate token with Sanctum';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $login = $this->argument('login');
        $password = $this->argument('password');

        $user = User::where('email', $login)->first();

        if (Hash::check($password, $user->password)) {
            $this->line($user->createToken('submit-token', ['json:update'])->plainTextToken);
        } else {
            $this->error('Wrong password or User email!');
        }

    }
}
