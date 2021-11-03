<?php

require 'vendor/autoload.php';

use App\Conversion;
use App\Exceptions\InvalidUnitException;

$error = null;
$value = null;
if (isset($_GET['unit']) && isset($_GET['from']) && isset($_GET['to'])) {
    try {
        $value = (new Conversion())->convert($_GET['unit'], $_GET['from'], $_GET['to']);
    } catch (InvalidUnitException $e) {
        $error = 'Invalid units, please check the units and try again.';
    } catch (Throwable $e) {
        $error = 'Something went wrong.';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Converter</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/@tailwindcss/forms@0.3.4/dist/forms.min.css" rel="stylesheet">

</head>

<body>
    <? if ($error) : ?>
        <div class="bg-red-600 mb-6">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center">
                        <span class="flex p-2 rounded-lg bg-red-800">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </span>
                        <p class="ml-3 font-medium text-white truncate">
                            <span class="md:hidden">
                                <?= $error ?>
                            </span>
                            <span class="hidden md:inline">
                                Error! <?= $error ?>.
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <? elseif ($value) : ?>
        <div class="bg-indigo-600 mb-6">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="w-0 flex-1 flex items-center">
                        <span class="flex p-2 rounded-lg bg-indigo-800">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                        </span>
                        <p class="ml-3 font-medium text-white truncate">
                            <span class="md:hidden">
                                <?= $value ?> <?= $_GET['to'] ?>
                            </span>
                            <span class="hidden md:inline">
                                Success! <?= $_GET['unit'] ?> <?= $_GET['from'] ?> is equal to <?= $value ?> <?= $_GET['to'] ?>.
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <? endif; ?>

    <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Converter</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Please fill the form to convert the values.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form>
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div>
                                <label for="unit" class="block text-sm font-medium text-gray-700">
                                    Unit Value
                                </label>
                                <div class="mt-1">
                                    <input type="number" id="unit" name="unit" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder=""></textarea>
                                </div>
                            </div>
                            <div>
                                <label for="from" class="block text-sm font-medium text-gray-700">
                                    From
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="about" name="from" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="kilometer"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Eg: kilometer,meter.
                                </p>
                            </div>
                            <div>
                                <label for="to" class="block text-sm font-medium text-gray-700">
                                    To
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="to" name="to" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="meter"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Eg: kilometer,meter.
                                </p>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Convert
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>