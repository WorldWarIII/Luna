<?php

namespace Luna\ReceptionBundle\Controller;

use Luna\ReceptionBundle\Entity\Room;
use Luna\ReceptionBundle\Form\RoomType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\View\RedirectView;



class RoomController extends FOSRestController
{
    const ROOMS_SERVICE = 'luna.room.service';

    /**
     * List all rooms.
     *
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing companies.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many rooms to return.")
     *
     * @param Request               $request      the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function getRoomsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = $paramFetcher->get('offset');
        $offset = null == $offset ? 0 : $offset;
        $limit = $paramFetcher->get('limit');

        return $this->container->get(self::ROOMS_SERVICE)->findAll($limit, $offset);
    }

    /**
     * Get single Room.
     *
     * @param int $id the room id
     *
     * @return array
     *
     * @throws NotFoundHttpException when room not exist
     */
    public function getRoomAction($id)
    {
        $room = $this->getOr404($id);
        return $room;
    }

    /**
     * Presents the form to use to create a new room.
     *
     * @Template("LunaReceptionBundle:Room:newRoom.html.twig")
     * @return FormTypeInterface
     */
    public function newRoomAction()
    {
        return $this->createForm(new RoomType(), null, array(
            'action' => $this->generateUrl('post_room')));
    }

    /**
     * Create a Room from the submitted data.
     *
     * @param Request $request the request object
     *
     * @return FormTypeInterface|View
     */
    public function postRoomAction(Request $request)
    {

        $room = $this->processRoomForm(new Room(), $request, 'POST');

        try {
            $room = $this->container->get(self::ROOMS_SERVICE)
                ->saveRoom($room)
            ;

            return $room;
        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }

    }


    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteRoomAction($id)
    {
        $room = $this->getOr404($id);

        $this->container->get(self::ROOMS_SERVICE)
                        ->removeRoom($room)
        ;
        //return new View($data=null, $statusCode=Response::HTTP_NO_CONTENT);
        return $room;
    }

    /**
     * Update existing room from the submitted data or create a new room at a specific location.
     *
     * @param Request $request the request object
     * @param int $id the room id
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException when room not exist
     */
    public function putRoomAction(Request $request, $id)
    {
        try {
            if (!($room = $this->container->get(self::ROOMS_SERVICE)->findById($id))) {

                //$statusCode = Codes::HTTP_CREATED;
                $room = $this->processRoomForm(new Room(), $request, 'POST');
                $room = $this->container->get(self::ROOMS_SERVICE)
                                        ->saveRoom($room)
                ;

            } else {

                //$statusCode = Codes::HTTP_NO_CONTENT;
                $room = $this->processRoomForm($room, $request, 'PUT');
                $room = $this->container->get(self::ROOMS_SERVICE)
                                        ->saveRoom($room)
                ;
            }
            return $room;

        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
     * Update existing room from the submitted data or create a new room at a specific location.
     *
     * @param Request $request the request object
     * @param int $id the room id
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException when room not exist
     */
    public function patchRoomAction(Request $request, $id)
    {
        try {
            $room = $this->getOr404($id);
            $room = $this->processRoomForm($room, $request, 'PATCH');

            $room = $this->container->get(self::ROOMS_SERVICE)
                                    ->saveRoom($room)
            ;
            return $room;
        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }


    /**
     * Fetch a Room or throw an 404 Exception.
     *
     * @param mixed $id
     *
     * @return RoomInterface
     *
     * @throws NotFoundHttpException
     */
    protected function getOr404($id)
    {
        if (!($room = $this->container->get(self::ROOMS_SERVICE)->findById($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$id));
        }

        return $room;
    }

    /**
     * @param Room $room
     * @param Request $request
     * @param string $method
     * @return Room
     */
    private function processRoomForm(Room $room, Request $request, $method = 'PUT')
    {
        $formFactory = $this->container->get('form.factory');

        $form = $formFactory->create(new RoomType(), $room, array('method' => $method));
        $form->submit($request, 'PATCH' !== $method);

        if (!$form->isValid())
            throw new InvalidFormException('Invalid submitted data', $form);

        return $room;
    }

}
