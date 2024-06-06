<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productPage = document.querySelector('.product-information');
        if (productPage) {
            const combinationSelect = document.querySelector('#group_id');
            combinationSelect.addEventListener('change', function() {
                const combinationId = combinationSelect.value;
                updateDescriptions(combinationId);
            });
        }
    });

    function updateDescriptions(combinationId) {
        fetch(`/index.php?fc=module&module=combi_descriptions&controller=getCombinationDescriptions&id_combination=${combinationId}`)
            .then(response => response.json())
            .then(data => {
                document.querySelector('.product-description .description').innerHTML = data.description;
                document.querySelector('.product-short-description .description-short').innerHTML = data.description_short;
            });
    }
</script>
