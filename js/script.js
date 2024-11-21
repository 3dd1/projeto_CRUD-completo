document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const idTarefa = this.dataset.id;

            if (confirm("Tem certeza que deseja excluir esta tarefa?")) {
                // Fazer a requisição para excluir
                fetch('excluir.php?id=' + idTarefa)
                    .then(response => response.text())
                    .then(data => {
                        if (data.trim() === 'sucesso') {
                            alert("Tarefa excluída com sucesso!");
                            // Remover a linha da tabela
                            this.parentElement.parentElement.remove();
                        } else {
                            alert("Erro ao excluir a tarefa. Resposta: " + data);
                        }
                    })
                    .catch(error => {
                        console.error('Erro na requisição:', error);
                        alert("Erro ao tentar excluir a tarefa.");
                    });
            }
        });
    });
});
