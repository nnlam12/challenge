<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./../login.php");
    exit();
}
?>

<h1 class="text-3xl text-black pb-6">Tower</h1>
<h1 class="text-xl text-black pb-6">This was where the great prophet Octodapus gave out his visions</h1>

<div class="w-full mt-6">
    
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Note</th>
                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Entry Date</th>
                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Attachment Links</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <tr>
                    <td class="w-1/4 text-left py-3 px-4">1</td>
                    <td class="w-1/4 text-left py-3 px-4">Contact the bank</td>
                    <td class="w-1/4 text-left py-3 px-4">2025-02-01</td>
                    <td class="w-1/4 text-left py-3 px-4"><a href="./Octo/octo1.png" download class="hover:text-blue-500">Download Vision</a></td>
                </tr>
                <tr class="bg-gray-200">
                    <td class="w-1/4 text-left py-3 px-4">2</td>
                    <td class="w-1/4 text-left py-3 px-4">Visit a cardiologist</td>
                    <td class="w-1/4 text-left py-3 px-4">2025-03-02</td>
                    <td class="w-1/4 text-left py-3 px-4"><a href="./Octo/octo2.png" download class="hover:text-blue-500">Download Vision</a></td>
                </tr>
                <tr>
                    <td class="w-1/4 text-left py-3 px-4">3</td>
                    <td class="w-1/4 text-left py-3 px-4">[REDACTED]</td>
                    <td class="w-1/4 text-left py-3 px-4">2025-04-03</td>
                    <td class="w-1/4 text-left py-3 px-4"><a href="./Octo/octo3.png" download class="hover:text-blue-500">Download Vision</a></td>
                </tr>
                <tr class="bg-gray-200">
                    <td class="w-1/4 text-left py-3 px-4">4</td>
                    <td class="w-1/4 text-left py-3 px-4">Report to His Majesty</td>
                    <td class="w-1/4 text-left py-3 px-4">2025-05-04</td>
                    <td class="w-1/4 text-left py-3 px-4"><a href="./Octo/octo4.png" download class="hover:text-blue-500">Download Vision</a></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>