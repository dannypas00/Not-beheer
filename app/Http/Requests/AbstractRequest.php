<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Nette\NotImplementedException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AbstractRequest
 *
 * @package App\Http\Requests
 */
class AbstractRequest extends FormRequest
{
    protected array $defaultRules = [
        '_token' => 'sometimes|string'
    ];

    /**
     * @return array<string>
     */
    public function validationData(): array
    {
        $this->validateAllowedInputParameters();

        $input = $this->all();
        $this->replace($input);
        $this->request->replace($input);

        // Do the parent thing
        return parent::validationData();
    }

    /**
     * @return void
     */
    private function validateAllowedInputParameters(): void
    {
        $disallowedParameters = [];
        $this->validateParameters($disallowedParameters, array_keys($this->rules()), $this->input());

        // Get the difference between request keys and the rule keys
        if (filled($disallowedParameters)) {
            throw new HttpResponseException(
                new JsonResponse(['errors' => $disallowedParameters], Response::HTTP_NOT_ACCEPTABLE)
            );
        }
    }


    /**
     * @param string[] $ruleKeys
     * @param array<string|int|bool|null|array> $input
     * @param string $previous
     * @param array<string> $errors
     */
    private function validateParameters(array &$errors, array $ruleKeys, array $input, string $previous = ''): void
    {
        // Check all input fields if they are valid
        foreach ($input as $field => $data) {
            $key = $field;

            // Prepend the key with the previous run for multi dimensional array checks
            if (filled($previous)) {
                // Check if the field is part of a non associative array and set the key according
                $key = $previous . '.' . $field;
            }

            // If the field is part of a non associative array, set the key according
            if (is_int($field)) {
                $key = $previous . '.' . $field;
            }

            // If the data for this field/key is an array for itself, lets check this fields too
            if (is_array($data)) {
                $this->validateParameters($errors, $ruleKeys, $data, $key);
                continue;
            }

            $starKey = $this->starKey($key);

            // Check if the key exists in the rules
            if (!in_array($starKey, $ruleKeys, true)) {
                $errors[$key] = sprintf(
                    'Parameter %s is not allowed.',
                    str_replace('.', ' ', Str::snake(Str::studly($key), ' '))
                );
            }
        }
    }

    /**
     * Replace numb
     *
     * @param string $key
     * @return string
     */
    private function starKey(string $key): string
    {
        // Explode the key into parts
        $parts = explode('.', $key);

        // Loop through (key) parts and modify the numeric values to '*'
        $parts = array_map(
            static function ($part): string {
                // Check if this part should be a star
                if (is_numeric($part)) {
                    // Make this part a star!
                    $part = '*';
                }

                // Return the part
                return $part;
            },
            $parts
        );

        // Implode the parts back into a key, with stars!
        return implode('.', $parts);
    }

    /**
     * @return array<string>
     */
    public function rules(): array
    {
        throw new NotImplementedException('Request does not implement rules function');
    }
}
