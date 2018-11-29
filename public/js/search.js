const app = angular.module('proBook', []);

app.controller('searchBook', ($scope, $http) => {

    let spinner = document.getElementById("loading-spinner");
    let notfound = document.getElementById("not-found");


    $scope.submitSearch = () => {
        spinner.style.display = "block";
        notfound.style.display = "none";
        $scope.result = [];

        $http.get("/home/searchbook/" + $scope.keyword).then(function(response) {
            spinner.style.display = "none";

            console.log(response.data);
            if (response.data) {
                if (response.data.length) {
                    response.data.forEach(element => {
                        if (Object.keys(element).length < 9) {
                            return;
                        }

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
                }
                else if (Object.keys(response.data).length >= 9) {
                    console.log("mantap");
                    let element = response.data;
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
                }
                else {
                    notfound.style.display = "block";
                }
               
            }
            else {
                notfound.style.display = "block";
            }
            
        });
    }
});