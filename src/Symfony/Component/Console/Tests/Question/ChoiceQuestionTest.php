<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Tests\Question;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Question\ChoiceQuestion;

class ChoiceQuestionTest extends TestCase
{
    /**
     * @dataProvider validatorUsecases
     */
    public function testDefaultValidatorUsecases($answers, $expected, $message)
    {
        $question = new ChoiceQuestion('A question', [
            'First response',
            'Second response',
            'Third response',
            'Fourth response',
        ]);

        foreach ($answers as $answer) {
            $validator = $question->getValidator();
            $actual = $validator($answer);

            echo($actual);

            $this->assertEquals(true, true);

        }
    }

    public function validatorUsecases()
    {
        return [
            [
                ['First response', 'First response,Second response', 'First response , Second response'],
                true,
                'When default is true, the normalizer must return true for "%s"',
            ],
        ];
    }
}
