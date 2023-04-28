

const endpoint = `https://pokeapi.co/api/v2/`;

document.getElementById('ChangeGrid').addEventListener("click" , () => {
    var List = document.getElementById('ListBox');
    if (List.classList.contains('list-card')){
        List.classList.remove("list-card")
    }else{
        List.classList.add("list-card")
    }
}, true);

document.getElementById('OrderSelect').addEventListener("change" , () => {
   
    let temp_items = document.getElementById('TempTypes').innerHTML;
    var orderItems = reorderArray( JSON.parse( temp_items ) );
    let ListWrap   = document.getElementById('ListWrap');
    printTypes( orderItems, ListWrap );
    let activeType = document.getElementById('ActiveList').innerHTML;
    let el = document.getElementsByClassName( activeType ) ;
    
    if( el[0] !== undefined ){
        focusListType( el[0] );

        var ListPokemon = document.getElementById('ListPokemon');
        let temp_pokemons = document.getElementById('TempPokemon').innerHTML;
        var orderItems = reorderArray( JSON.parse( temp_pokemons ) );

        printPokemons( orderItems, ListPokemon );
    }


}, true);

async function getDataApi( uri = "" ){

    let rs = await fetch( endpoint+uri );
    return await rs.json();

}

function initListTypes(){
    
    getDataApi("type")
    .then((data) => {
        
        if( data.results ){

            document.getElementById('TempTypes').innerHTML = JSON.stringify(data.results);
            let ListWrap = document.getElementById('ListWrap');
            let orderItems = reorderArray( data.results );

            printTypes( orderItems, ListWrap );

        }else{
            document.getElementById('TempTypes').innerHTML = "[]";
            alert("Lista vacia");
        }
        
    });
}

function loadPokemons(){
    let url = this.getAttribute("data-url");
    focusListType( this );
    
    getDataApi( url )
    .then(  (data) => {
        var ListPokemon = document.getElementById('ListPokemon');
        const slicedPokemon = data.pokemon.slice(0, 20);
        document.getElementById('TempPokemon').innerHTML = JSON.stringify( slicedPokemon );

        let orderItems = reorderArray( slicedPokemon );

        printPokemons( orderItems, ListPokemon );

    });

}

function printTypes( orderItems, ListWrap ){

    document.getElementById('ListWrap').innerHTML = "";

    for( const t in orderItems){
        let type = orderItems[t];
        let base = document.getElementById('BaseType').cloneNode(true).children;
    
        base[0].getElementsByClassName("type-name")[0].appendChild(
            Object.assign(
                document.createElement("span"), {
                    innerHTML: type.name.charAt(0).toUpperCase() + type.name.slice(1) ,
                }
            )
        );

        let btn = Object.assign(
            document.createElement("button"), {
                innerHTML: "Volver" ,
                classList: "hidden"
            }
        );
        btn.addEventListener("click" , showListType, true);
        base[0].appendChild(
            btn
        );

        base[0].getElementsByClassName("statistic-wrap")[0].setAttribute("data-url",type.url.replace( endpoint , "" ));
        base[0].getElementsByClassName("statistic-wrap")[0].setAttribute("data-type",type.name);
        base[0].setAttribute("data-url",type.url.replace( endpoint , "" ));
        base[0].setAttribute("data-type",type.name);
        base[0].classList.add( type.name );
        base[0].getElementsByClassName("statistic-wrap")[0].addEventListener("click" , loadPokemons, true);

        ListWrap.appendChild( base[0] );
    }
}

function printPokemons( orderItems, ListWrap ){

    document.getElementById('ListPokemon').innerHTML = '';

    for( const p in orderItems ){
        let pokemon = orderItems[p];

         getDataApi( pokemon.pokemon.url.replace( endpoint , "" ) )
        .then((rs) => {
            let base = document.getElementById('BasePoke').cloneNode(true).children;
            let sprite = rs.sprites.other["official-artwork"].front_default;
            let name   = rs.name;

            base[0].appendChild(
                Object.assign(
                    document.createElement("img"), {
                        src: sprite ,
                    }
                )
            );
            base[0].appendChild(
                Object.assign(
                    document.createElement("span"), {
                        innerHTML: name.charAt(0).toUpperCase() + name.slice(1) ,
                    }
                )
            );

            base[0].setAttribute("data-number", p );
            ListWrap.appendChild( base[0] );

        })
        
    }

}

function reorderArray( el ){

    let select = document.getElementById("OrderSelect");

    if( select.value === "asc" ){
        el.sort((a, b) => {
            let fa = ( a.pokemon !== undefined ? a.pokemon.name.toLowerCase() : a.name.toLowerCase() ) ,
            fb = ( b.pokemon !== undefined ? b.pokemon.name.toLowerCase() : b.name.toLowerCase() );

            if (fa < fb) {
                return -1;
            }
            if (fa > fb) {
                return 1;
            }
            return 0;
        })
    }else if( select.value === "des" ){
        el.sort((a, b) => {
            let fa = ( a.pokemon !== undefined ? a.pokemon.name.toLowerCase() : a.name.toLowerCase() ) ,
            fb = ( b.pokemon !== undefined ? b.pokemon.name.toLowerCase() : b.name.toLowerCase() );

            if (fa < fb) {
                return 1;
            }
            if (fa > fb) {
                return -1;
            }
            return 0;
        })
    }

    return el;
}

function focusListType( el ){
    let ListWrap    = document.getElementById('ListWrap');
    const childern  = ListWrap.childNodes;
    document.getElementById('ActiveList').innerHTML = el.getAttribute("data-type");
    el.parentElement.getElementsByTagName("button")[0].classList.remove( "hidden" );
    childern.forEach( node => {
        if( node.getAttribute("data-url") !== el.getAttribute("data-url") ){
            node.classList.add( "hidden" );
        }
    });
}

function showListType(){
    let ListWrap    = document.getElementById('ListWrap');
    const childern  = ListWrap.childNodes;
    document.getElementById('ListPokemon').innerHTML = "";

    childern.forEach( node => {
      
        node.classList.remove( "hidden" );
        node.getElementsByTagName("button")[0].classList.add( "hidden" );
    });

    document.getElementById('ActiveList').innerHTML = "";
}

initListTypes();

