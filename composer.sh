#!/bin/bash

opcion=0
linea=""

folder_name="project1"

project_name=""
package_name=""

get_menu_opciones() {
    clear
    echo
    echo -e "\t\t--------------- COMPOSER ---------------\n"
    
    echo -e "\t\t--------- Inicio ---------"
	echo -e "\t\t1. Instalar Composer"
    echo -e "\t\t2. Inicializar Composer (php composer.phar init)"

    echo -e "\n\t\t--------- Mostrar ---------"
    echo -e "\t\t3. Mostrar Paquetes (php composer.phar show)"
    echo -e "\t\t4. Buscar Paquetes (php composer.phar search)"

    echo -e "\n\t\t--------- Instalar ---------"
    echo -e "\t\t5. Instalar Paquete (php composer.phar require monolog/monolog)"
    echo -e "\t\t6. Instalar Proyecto (composer create-project laravel/laravel)"
    echo -e "\t\t7. Instalar Paquetes (php composer.phar install)"

    echo -e "\n\t\t--------- Mantenimiento ---------"
    echo -e "\t\t8. Actualizar Paquete/s (php composer.phar update)"
    echo -e "\t\t9. Eliminar Paquete/s (php composer.phar remove)"
    echo -e "\t\t10. Reinstalar Paquete/s (php composer.phar reinstall)"

    echo -e "\n\t\t--------- Verificar ---------"
    echo -e "\t\t11. Validar Composer (php composer.phar validate)"
    echo -e "\t\t12. Estado Composer (php composer.phar status -v)"
    
    echo -e "\n\t\t--------- Autoload ---------"
    echo -e "\t\t16. Actualizar Autoload Files (php composer.phar dump-autoload -o)"

    echo -e "\n\t\t--------- AYUDA ---------"
    echo -e "\t\t98. Lista Comandos Ayuda Composer (php composer.phar list)"
    echo -e "\t\t99. Ayuda Composer (php composer.phar -h)"

    echo -e "\n\t0. Salir\n\n"
    
    read -p "Escoja una Opcion: " opcion
}

exec_install_composer() {
	clear	
    echo -e "-----------1. Instalar Composer-------------"
    echo    

    mkdir ${folder_name}

    cd ${folder_name}
    
    # Download File: composer.phar

    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

    php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    
    php composer-setup.php
    
    php -r "unlink('composer-setup.php');"

    cd .. 
}

exec_initialize_composer() {
	clear	
    echo -e "----------- 2. Inicializar Composer (php composer.phar init) -------------"
    echo
    
    cd ${folder_name}
    php ./composer.phar init
    cd ..
}

exec_show_packages() {
	clear	
    echo -e "----------- 3. Mostrar Paquetes (php composer.phar show) -------------"
    echo
    
    cd ${folder_name}
    php ./composer.phar show
    cd ..
}

exec_search_packages() {
	clear	
    echo -e "----------- 4. Buscar Paquetes (php composer.phar search) -------------"
    echo
    
    read -p "Ingrese paquete (laravel,pdf,exel,monolog,etc): " package_name

    cd ${folder_name}
    php ./composer.phar search ${package_name}
    cd ..
}

exec_install_package() {
	clear	
    echo -e "----------- 5. Instalar Paquete (composer require monolog) -------------"
    echo
    
    read -p "Ingrese paquete (monolog/monolog,etc): " package_name

    cd ${folder_name}
    php ./composer.phar require ${package_name}
    cd ..
}

exec_install_project() {
	clear	
    echo -e "----------- 6. Instalar Proyecto (composer create-project laravel) -------------"
    echo
    
    read -p "Ingrese proyecto (laravel/laravel,etc): " project_name

    cd ${folder_name}
    php ./composer.phar create-project ${project_name}
    cd ..
}

exec_install_packages() {
	clear	
    echo -e "----------- 7. Instalar Paquetes (php composer.phar install) -------------"
    echo
    
    cd ${folder_name}
    php ./composer.phar install
    cd ..
}

exec_update_composer() {
	clear	
    echo -e "----------- 8. Actualizar Paquete/s (php composer.phar update) -------------"
    echo
    
    cd ${folder_name}
    php ./composer.phar update
    cd ..
}

exec_delete_composer() {
	clear	
    echo -e "----------- 9. Eliminar Paquete/s (php composer.phar remove) -------------"
    echo
    
    read -p "Ingrese paquete (laravel/laravel,etc): " package_name

    cd ${folder_name}
    php ./composer.phar remove ${package_name}
    cd ..
}

exec_reinstall_composer() {
	clear	
    echo -e "----------- 10. Reinstall Paquete/s (php composer.phar reinstall) -------------"
    echo
    
    read -p "Ingrese paquete (laravel/laravel,etc): " package_name

    cd ${folder_name}
    php ./composer.phar reinstall ${package_name}
    cd ..
}

exec_validate_composer() {
	clear	
    echo -e "----------- 11. Validar Composer (php composer.phar validate) -------------"
    echo
    
    cd ${folder_name}
    php ./composer.phar validate
    cd ..
}

exec_status_composer() {
	clear	
    echo -e "----------- 12. Estado Composer (php composer.phar status -v) -------------"
    echo
    
    cd ${folder_name}
    php ./composer.phar status -v
    cd ..
}

exec_update_autoload() {
	clear	
    echo -e "----------- 16. Actualizar Autoload Files (php composer.phar dump-autoload -o) -------------"
    echo
    
    cd ${folder_name}
    php ./composer.phar dump-autoload -o
    cd ..
}

get_help_composer() {
	clear	
    echo -e "----------- 99. Ayuda Composer (php composer.phar -h) -------------"
    echo
    
    cd ${folder_name}
    php ./composer.phar --help
    cd ..

    # php ./composer.phar -h
}

get_list_commands_help_composer() {
	clear	
    echo -e "----------- 98. Lista Comandos Ayuda Composer (php composer.phar list) -------------"
    echo
    
    cd ${folder_name}
    php ./composer.phar list
    cd ..
}

while [ 1 ]
do

    get_menu_opciones

    case $opcion in
    
        0)
            clear ;
            echo -e "Proceso terminado correctamente..." ;
            break ;;
            
        1) exec_install_composer ;;
        2) exec_initialize_composer ;;
        3) exec_show_packages ;;
        4) exec_search_packages ;;
        5) exec_install_package ;;
        6) exec_install_project ;;
        7) exec_install_packages ;;
        8) exec_update_composer ;;
        9) exec_delete_composer ;;
        10) exec_reinstall_composer ;;

        11) exec_validate_composer ;;
        12) exec_status_composer ;;                
        
	    16) exec_update_autoload ;;

        98) get_list_commands_help_composer ;;
        99) get_help_composer ;;

        *)  echo -e "Seleccion Incorrecta" ;;

    esac

echo -e "Presione la tecla Enter para continuar"
read linea

done

# ---------------------------- URLs ---------------------------------

# https://packagist.org/