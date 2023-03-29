<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Service\CartTools;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{

    
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(SessionInterface $session, ProduitRepository $produitRepository): Response
    {
        if($this->getUser()->getClient()===null){
            $this->addFlash("warning", "Vous devriez créez un compte client. Vous n'êtes pas autorisé(e) à accedez au panier. Seuls les clients.");
            return $this->redirectToRoute('app_register', [], Response::HTTP_SEE_OTHER);

        }

        $panier=$session->get('panier',[]);
        $dataPanier=[];
        $prixTotalPanier=0;
        $quantiteProduits=0;
        $user=$this->getUser();
        if($user){
            $fraisLivraison=$user->getClient()->getZoneLivraisonPreferentielle()->getPrix();
        }else{
            
            $this->addFlash("success", "Vous n'avez pas le profile client");
            $fraisLivraison=0;
            return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
        }        foreach($panier as $id=>$quantite){
            $produit=$produitRepository->find($id);
            if($produit){
                $dataPanier[]=[
                    'produit'=>$produit,
                    'quantite'=>$quantite,
                ];
                $prixTotalPanier +=$produit->getPrixVente() * $quantite;
                $quantiteProduits +=$quantite;
    
            }
        }
        

        // dd($prixTotalPanier + $fraisLivraison);
        return $this->render('panier/index.html.twig', [
            "dataPanier"=>$dataPanier,
            "total"=>$prixTotalPanier,
            "grandTotal"=>$prixTotalPanier + $fraisLivraison,
            "quantiteProduits"=>$quantiteProduits,
            "fraisLivraison"=>$fraisLivraison,
        ]);
    }


    
    /**
     * @Route("/panierFlottant", name="panier_flottant")
     */
    public function panierFlottant(SessionInterface $session, ProduitRepository $produitRepository): Response
    {
        $panier=$session->get('panier',[]);
        $dataPanier=[];
        $prixTotalPanier=0;
        $quantiteProduits=0;

        $user=$this->getUser();
        if($user){
            if($user->getClient()){
                $fraisLivraison=$user->getClient()->getZoneLivraisonPreferentielle()->getPrix();
            }else{
                $fraisLivraison=0;             
            }
        }else{
            
            $this->addFlash("success", "Vous n'avez pas le profile client");
            $fraisLivraison=0;            
        }

        foreach($panier as $id=>$quantite){
            $produit=$produitRepository->find($id);
            if($produit){
                $dataPanier[]=[
                    'produit'=>$produit,
                    'quantite'=>$quantite,
                ];
                $prixTotalPanier +=$produit->getPrixVente() * $quantite + $fraisLivraison;
                $quantiteProduits +=$quantite;
    
            }
        }
        
        return $this->render('_partials/_panier_flottant.html.twig', [
            "dataPanier"=>$dataPanier,
            "total"=>$prixTotalPanier ,
            "grandTotal"=>$prixTotalPanier + $fraisLivraison,
            "quantiteProduits"=>$quantiteProduits,
            "fraisLivraison"=>$fraisLivraison,
        ]);
    }


    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add(Produit $produit, SessionInterface $session): Response
    {

        $id=$produit->getId();
        $panier=$session->get('panier',[]);
        if(!empty($panier[$id])){
            $panier[$id]++;
        }else{
            $panier[$id]=1;
        }
        $session->set("panier",$panier);
        // dd($session);
        return $this->redirectToRoute('cart_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, ProduitRepository $produitRepository, SessionInterface $session)
    {
        
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            if($panier[$id]> 1){
                $panier[$id]--;
            }else{
                unset($panier[$id]);
            }
        }else{
            $this->addFlash('warning','Aucun produit pour cet identifiant');
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute('cart_index', [], Response::HTTP_SEE_OTHER);

    }


    #[Route('/deleteAll', name: 'app_panier_delete_all')]
    public function deleteAll(SessionInterface $session): Response
    {
        
        $session->set("panier",[]);
        // dd($session);
        return $this->redirectToRoute('cart_index', [], Response::HTTP_SEE_OTHER);
    }
}
