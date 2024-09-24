# BACK:

 - setup docker **CHECK**
 - setup symfony **CHECK**
 - installer dependance **CHECK**
 - creer les entitées **CHECK**
 - creer fichier de migration **CHECK**
 - connecter DB au projet **CHECK**
 - creer les controllers **CHECK**
 - creer fixtures **CHECK**
 - si le temps, ameliorer les fixtures pour + d'aleatoire
 - gerer le hash du password
 - gerer le JWT
 - implementer le refresh token
 - securiser les controllers via le ROLE !!!
 - ...

# FRONT:

 - creer les pages principales **CHECK**
 - creer header **CHECK**
 - creer footer **CHECK**
 - creer les composants

 - CHANGER LES VALEURS EN DUR HEADER: <a href='/user/1/basket'>

# Entity:

## USER:
REFAIRE LA CLASSE AVEC make:user
id
mail
password
firstName
lastName
(adresse postale?)
ROLES


## PRODUCT:
id
name
shortDescription
fullDescription
price
picture

## COMMAND:
id
date
totalprice
user (manyToOne)
product (manyToMany)
Si + plus de temps, stocker le prix du produit a l'achat 
dans command_product

# PAGES:

 - home **CHECK**
 - product/id **CHECK**
 - login **CHECK**
 - subscribe **CHECK**
 - panier **CHECK**
 - account **CHECK**
 - 404 **Manque la redirection**

# Components:

- navigation **CHECK (manque le responsive)**
- hero header **CHECK**
- footer **CHECK**
- product list **CHECK**
- product item
- form add product
- form login
- form subscribe
- « Déjà un compte ? Se connecter »
- panier list
- command list history

# Questions pour David:

- gerer la redirection en 404


