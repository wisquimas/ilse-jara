import $ from 'jquery'

const Coleccion = {
    elementos: $('.Coleccion--galeria--foto'),
    init(){
        if (this.elementos.length) {
            this.Listeners();
        }
    },
    Listeners(){
        this.elementos.on('click', function () {
            alert('hi');
        })
    }
};

export default Coleccion;