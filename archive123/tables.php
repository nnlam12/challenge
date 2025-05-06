<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./../login.php");
    exit();
}
?>

<h1 class="text-3xl text-black pb-6">Dinning Hall</h1>

<div class="w-full mt-6">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Menu
    </p>
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Dishes</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Type</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Note</td>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <tr>
                    <td class="w-1/3 text-left py-3 px-4">Seaweed salad</td>
                    <td class="w-1/3 text-left py-3 px-4">Appetizer</td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500">Locally farmed seaweed</a></td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500">His majesty doesn't enjoy it too much.</a></td>
                </tr>
                <tr class="bg-gray-200">
                    <td class="w-1/3 text-left py-3 px-4">Takoyaki</td>
                    <td class="w-1/3 text-left py-3 px-4">Appetizer</td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500">Suspicious ingredient havested last week cooked in Japanese styles</a></td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500">To be served only to the king.</a></td>
                </tr>
                <tr>
                    <td class="w-1/3 text-left py-3 px-4">Fish and Chips</td>
                    <td class="w-1/3 text-left py-3 px-4">Main dish</td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500">"No description"</a></td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"></a>
                    </td>
                </tr>
                <tr class="bg-gray-200">
                    <td class="w-1/3 text-left py-3 px-4">Ice cream</td>
                    <td class="w-1/3 text-left py-3 px-4">Dessert</td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500">Frozen cream with weird taste</a></td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500">To be preserve in ice</a></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
        
<div class="w-full mt-12">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Guest List
    </p>
    <div class="bg-white overflow-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Name
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Role
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Note
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Confirmation
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-16 h-16">
                                <i class="fas fa-crown text-4xl mr-3"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    "His Majesty"
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">King</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            King of the fish kingdom, no one knows or dares to mention his real name
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <span
                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                            <span aria-hidden
                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                            <span class="relative">Present</span>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <div class="flex-shrink-0 w-16 h-16">
                                    <i class="fas fa-chess-knight    text-4xl mr-3"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    Sir Lanseahorse
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">Knight</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            Knight of the fish kingdom, secretly in love with the queen
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <span
                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                            <span aria-hidden
                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                            <span class="relative">Present</span>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                            <div class="flex-shrink-0 w-16 h-16">
                                    <i class="fas fa-eye    text-4xl mr-3"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    Octradapus
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">Prophet</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            Executed last week for finding out the king's secret
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <span
                            class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                            <span aria-hidden
                                class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                            <span class="relative">Canceled</span>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="px-5 py-5 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <div class="flex-shrink-0 w-16 h-16">
                                    <i class="fas fa-gem    text-4xl mr-3"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    Crabanker
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">Goldkeeper</p>
                    </td>
                    <td class="px-5 py-5 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">He's on sick leave so the bank might be a bit little out of control</p>
                    </td>
                    <td class="px-5 py-5 bg-white text-sm">
                        <span
                            class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                            <span aria-hidden
                                class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                            <span class="relative">Absent</span>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>