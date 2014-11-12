<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace NasRecPublic\Form;

use Doctrine\ORM\EntityRepository;
use Nascenia\Zend\Form\Form;
use Nascenia\Zend\Hydrator;
use RdnUpload\ContainerInterface;
use RdnUpload\Hydrator\Strategy;
use Zend\InputFilter\InputFilterProviderInterface;

class Application extends Form implements InputFilterProviderInterface
{
    /**
     * @var EntityRepository
     */
    protected $applications;

    /**
     * @var ContainerInterface
     */
    protected $uploads;

    public function __construct(EntityRepository $applications, ContainerInterface $uploads)
    {
        $this->applications = $applications;
        $this->uploads = $uploads;

        parent::__construct();
    }

    public function init()
    {
        $hydrator = new Hydrator\Entity;
        $hydrator->addStrategy('resume', new Strategy\Upload($this->uploads));

        $this->setHydrator($hydrator);

        $this->add(array(
            'type' => 'NasRecPublic:Fieldset:Position',
            'name' => 'position',
        ));

        $this->add(array(
            'type' => 'NasRecPublic:Fieldset:User',
            'name' => 'user',
        ));

        $this->add(array(
            'type' => 'file',
            'name' => 'resume',

            'options' => array(
                'label' => 'Resume',
            ),
        ));

        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',

            'attributes' => array(
                'class' => 'btn btn-primary',
                'value' => 'Submit',
            ),
        ));
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            'position' => array(
                'type' => 'InputFilter',
                'id' => array(
                    'validators' => array(
                        array(
                            'name' => 'callback',
                            'options' => array(
                                'callback' => function () {
                                    $previousApp = $this->applications->createQueryBuilder('a')
                                        ->leftJoin('a.user', 'u')
                                        ->where('u.email = :email')
                                        ->setParameter('email', $this->data['user']['email'])

                                        ->leftJoin('a.position', 'p')
                                        ->andWhere('p.id = :pid')
                                        ->setParameter('pid', $this->data['position']['id'])

                                        ->setMaxResults(1)

                                        ->getQuery()
                                        ->getOneOrNullResult()
                                    ;

                                    return $previousApp == null;
                                },
                                'message' => 'You have already submitted an application for this position',
                            ),
                        ),
                    ),
                ),
            ),

            'resume' => array(
                'required' => true,
            ),
        );
    }
}
