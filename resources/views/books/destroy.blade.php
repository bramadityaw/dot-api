<dialog class="border border-[#1B3C73] rounded-md p-4 w-2/5">
    <div class="text-center">
        <p class="mb-4">Remove book?</p>
        <div class="flex flex-row justify-around text-white">
            <form method="dialog">
                <button type="submit" class="rounded-md px-3 py-2 bg-blue-500">Batal</button>
            </form>
                <button id="confirmDeleteButton" type="button" class="rounded-md px-3 py-2 bg-red-500">Hapus</button>
        </div>
    </div>
</dialog>
<script>
    const _token = "{{ csrf_token() }}";
    const _route = "{{ route('book.destroy', '') }}";
</script>
<script src="{{ url('js/delete.js') }}"></script>
