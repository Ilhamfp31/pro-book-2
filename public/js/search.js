const app = angular.module('proBook', []);

app.controller('searchBook', ($scope, $http) => {
    $scope.result = [];

    let spinner = document.getElementById("loading-spinner");
    spinner.style.display = "none";

    $scope.submitSearch = () => {
        spinner.style.display = "block";
        console.log(spinner);

        $http.get("/home/searchbook/" + $scope.keyword).then(function(response) {
            response.data.forEach(element => {
                spinner.style.display = "none";
                if (element.avg_rating) {
                    element.avg_rating = Number(element.avg_rating).toFixed(1).toString() + "/5.0";
                }
                else {
                    element.avg_rating = "No Rating";
                }

                element.author = element.author === "Tidak_Diketahui" ? "Unknown Author" : element.author;                

                const desc_length = 300;
                element.description = element.description === "Tidak_Diketahui" ? "No Description" : element.description;
                element.description = element.description.length > desc_length ? element.description.substring(0, desc_length-3) + '...' : element.description;
                
                const title_length = 100;
                element.title = element.title.length > title_length ? element.title.substring(0, title_length-3) + "..." : element.title;

                $scope.result.push(element);
            });
            
        });
    }
});